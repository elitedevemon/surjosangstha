<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\EmployeeDps;
use Illuminate\Http\Request;

class EmployeeDpsController extends Controller
{
  public function index()
  {
    $employees = EmployeeDps::with('employee')->get();
    return view('admin.pages.dps.index', compact('employees'));
  }

  public function create()
  {
    $employees = Employee::where('status', 'active')->select('id', 'name')->get();
    return view('admin.pages.dps.create', compact('employees'));
  }

  public function store(Request $request)
  {
    EmployeeDps::create($request->all());
    toastr()->success('DPS has been added.!');
    return redirect()->route('admin.dps.index');
  }

  public function info(Request $request)
  {
    $amount = $request->amount;
    $rate = $request->rate;
    $validity = $request->validity;

    // for 5 years dps
    $months = $validity * 12; // Convert years to months
    $total_balance = 0;

    for ($i = 0; $i < $months; $i++) {
      $total_balance += $amount; // Deposit amount
      $interest = ($total_balance * ($rate / 12)) / 100; // Monthly interest
      $total_balance += $interest; // Add interest to balance
    }

    return round($total_balance, 2); // Round off to 2 decimal places

    $employee = Employee::findOrFail($request->employee_id);
    $info = view('admin.pages.dps.partials.dps_info', compact(['employee', 'amount', 'rate', 'validity']))->render();
    return response()->json([
      'status' => 'success',
      'info' => $info
    ]);
  }
}
