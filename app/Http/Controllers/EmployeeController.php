<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRegisterRequest;
use App\Models\Branch;
use App\Models\Employee;
use App\Models\EmployeeDesignation;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    return view('admin.pages.employee.details');
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $branches = Branch::where('status', 'active')->get();
    $designations = EmployeeDesignation::where('status', 'active')->get();
    return view('admin.pages.employee.create', compact(['branches', 'designations']));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(EmployeeRegisterRequest $request)
  {
    image($request->own_photo, 'employee_profile');
  }

  /**
   * Display the specified resource.
   */
  public function show(Employee $employee)
  {
    return view('admin.pages.employee.details');
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Employee $employee)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Employee $employee)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Employee $employee)
  {
    //
  }
}
