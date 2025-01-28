<?php

namespace App\Http\Controllers;

use App\Http\Requests\DesignationRequest;
use App\Models\EmployeeDesignation;
use Illuminate\Http\Request;

class EmployeeDesignationController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $designations = EmployeeDesignation::orderBy('status')->get();
    return view('admin.pages.designation.index', compact('designations'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('admin.pages.designation.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(DesignationRequest $request)
  {
    try {
      EmployeeDesignation::create($request->all());
      toastr()->success('Data has been saved successfully!');
    } catch (\Throwable $th) {
      throw $th;
    }
    return redirect()->route('admin.designation.index');
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(EmployeeDesignation $designation)
  {
    return view('admin.pages.designation.edit', compact('designation'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(DesignationRequest $request, EmployeeDesignation $designation)
  {
    try {
      $designation->update($request->all());
      toastr()->success('Data has been updated successfully!');
    } catch (\Throwable $th) {
      throw $th;
    }
    return redirect()->route('admin.designation.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(EmployeeDesignation $designation)
  {
    try {
      $designation->delete();
      toastr()->success('Data has been deleted successfully!');
    } catch (\Throwable $th) {
      throw $th;
    }
    return back();
  }

  /**
   * Change status of the specified resource.
   */
  public function changeStatus(Request $request){
    $designation = EmployeeDesignation::findOrFail($request->id);
    $designation->status = ($request->status == 'true') ? 'active' : 'inactive';
    $designation->update();
    return response()->json(['message' => 'Status has been changed successfully!']);
  }
}
