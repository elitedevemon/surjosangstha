<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRegisterRequest;
use App\Http\Requests\CustomerUpdateRequest;
use App\Models\Admin\Customer;
use App\Models\Admin\Groups;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $customers = Customer::with('group')->orderBy("created_at","desc")->paginate(10);
    return view("admin.pages.customers.index", compact("customers"));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $groups = Groups::all();
    return view("admin.pages.customers.create", compact("groups"));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(CustomerRegisterRequest $request)
  {
    try {
      Customer::create($request->all());
      toastr()->success("Customer created successfully");
      return redirect()->route("admin.customer.index");
    } catch (\Throwable $th) {
      toastr()->error('Something went wrong');
      return back();
    }
  }

  /**
   * Display the specified resource.
   */
  public function show(Customer $customer)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Customer $customer)
  {
    $groups = Groups::all();
    return view("admin.pages.customers.edit", compact(['groups', 'customer']));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(CustomerUpdateRequest $request, Customer $customer)
  {
    try {
      $customer->update($request->all());
      toastr()->success("Customer updated successfully");
      return redirect()->route('admin.customer.index');
    } catch (\Throwable $th) {
      toastr()->error('Something went wrong');
      return back();
    }
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Customer $customer)
  {
    try {
      $customer->delete();
      toastr()->success("Customer deleted successfully");
      return redirect()->route('admin.customer.index');
    } catch (\Throwable $th) {
      toastr()->error('Something went wrong');
      return back();
    }
  }

  public function changeStatus(Request $request)
  {
    $customer = Customer::findOrFail($request->id);
    $customer->status = ($request->status == 'true') ? 'active' : 'inactive';
    $customer->update();
    return response()->json(['message' => 'Status has been changed successfully!']);
  }
}
