<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Admin\Customer;
use App\Models\OverDue;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ODController extends Controller
{
  public function newOdIndex()
  {
    $today = Carbon::today();

    $customers = OverDue::with('customer')
      ->where('paid_status', 'pending')
      ->where('employee_id', Auth::user()->employee_id)
      ->whereDate('created_at', $today)
      ->whereDate('updated_at', $today)
      ->paginate(10);
    return view("employee.pages.over-due.new-od.index", compact("customers"));
  }

  public function newOdCreate()
  {
    return view("employee.pages.over-due.new-od.create");
  }

  public function checkCustomer(Request $request)
  {
    $customer = Customer::where('code', $request->customer_code)->first();

    if ($customer) {
      return response()->json([
        'status' => 'success',
        'data' => $customer
      ]);
    } else {
      return response()->json([
        'status' => 'error',
        'message' => 'Customer not found.'
      ]);
    }
  }

  public function newOdStore(Request $request)
  {
    $request->validate([
      'customer_id' => 'required|numeric|exists:customers,id',
      'amount' => 'required|numeric|min:0',
      'due_paid_date' => 'required|date',
      'od_status' => 'required|in:new,block',
    ]);

    try {
      OverDue::create($request->all());
      return response()->json([
        'status' => 'success',
        'message' => 'Overdue record added successfully.'
      ]);
    } catch (\Throwable $th) {
      return response()->json([
        'status' => 'error',
        'message' => 'Something went wrong.' . $th->getMessage()
      ])->setStatusCode(500);
    }
  }

  public function newOdEdit(OverDue $overdue)
  {
    return view("employee.pages.over-due.new-od.edit", compact("overdue"));
  }

  public function newOdUpdate(OverDue $overdue, Request $request)
  {
    $request->validate([
      'customer_id' => 'required|numeric|exists:customers,id',
      'amount' => 'required|numeric|min:0',
      'due_paid_date' => 'required|date',
      'od_status' => 'required|in:new,block',
    ]);

    try {
      $overdue->update($request->all());
      toastr()->success("Overdue record updated successfully");
      return redirect()->route('employee.over-due.new-od.index');
    } catch (\Throwable $th) {
      toastr()->error('Something went wrong');
      return back();
    }
  }

  public function odRealizationIndex()
  {
    $today = Carbon::today();

    $customers = OverDue::with('customer')
      ->where('paid_status', 'pending')
      ->where('employee_id', Auth::user()->employee_id)
      ->whereDate('due_paid_date', $today)
      ->paginate(10);
    return view("employee.pages.over-due.od-realization.index", compact("customers"));
  }

  public function odRealizationPayment(OverDue $overdue)
  {
    $overdue->load('customer');
    return view("employee.pages.over-due.od-realization.payment", compact("overdue"));
  }

  public function odRealizationPayNow(OverDue $overdue)
  {
    try {
      if ($overdue->od_status === 'block') {
        if ($overdue->customer->block_customer_due === $overdue->amount) {
          $overdue->customer->update([
            'block_customer_due' => 0,
            'status' => 'inactive',
          ]);
        } else {
          $overdue->customer->update([
            'block_customer_due' => ($overdue->customer->block_customer_due - $overdue->amount),
          ]);
        }
      }
      $overdue->update([
        'paid_status' => 'paid',
      ]);
      return response()->json([
        'status' => 'success',
        'message' => 'Payment successful.',
        'redirect_url' => route('employee.over-due.od-realization.index')
      ])->setStatusCode(200);
    } catch (\Throwable $th) {
      return response()->json([
        'status' => 'error',
        'message' => 'Something went wrong.' . $th->getMessage()
      ])->setStatusCode(500);
    }
  }
}
