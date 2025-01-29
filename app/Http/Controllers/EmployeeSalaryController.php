<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\EmployeeSalary;
use Illuminate\Http\Request;

class EmployeeSalaryController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $employees = Employee::with('salary')->where('status', 'active')->select('id', 'employee_code', 'name')->get();
    return view('admin.pages.employee.salary_info', compact('employees'));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(EmployeeSalary $salary_info)
  {
    return view('admin.pages.employee.salary_info_edit', compact('salary_info'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, EmployeeSalary $salary_info)
  {
    $house_route_allowance = $request->basic_salary * 35 / 100;
    $medical_allowance = ceil($request->basic_salary * 10 / 100);
    $phone_bill = ceil($request->basic_salary * 20 / 100);
    $festival_bonus = ceil($request->basic_salary * 50 / 100);
    $total_salary = $house_route_allowance * 2 + $medical_allowance + $phone_bill + $request->basic_salary;

    if ($request->special_allowance) {
      $total_salary += $request->special_allowance;
    }

    $salary_info->update([
      'basic_salary' => $request->basic_salary,
      'house_rent' => $house_route_allowance,
      'medical_allowance' => $medical_allowance,
      'route_allowance' => $house_route_allowance,
      'phone_bill' => $phone_bill,
      'festival_bonus' => $festival_bonus,
      'total_salary' => $total_salary,
      'special_allowance' => $request->special_allowance
    ]);

    toastr()->success('Salary info updated successfully.!');
    return redirect()->route('admin.salary-info.index');
  }
}
