<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
  //index function
  public function index(){
    return view("admin.index");
  }

  //employeeList function
  public function employeeList(){
    $employees = Employee::with('contact')->get();
    // return $employees;
    return view('admin.pages.employee.index', compact('employees'));
  }
}
