<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DashboardController extends Controller
{
  //index function
  public function index()
  {
    return view("admin.index");
  }

  //employeeList function
  public function employeeList(Request $request)
  {
    if ($request->ajax()) {
      $employees = Employee::select(['id', 'employee_code', 'name', 'email', 'employee_designation_id', 'branch_id', 'status'])->with(['contact:id,employee_id,own_phone', 'employee_designation:id,designation', 'branch:id,branch_name'])->get();

      return DataTables::of($employees)
        ->addIndexColumn()
        ->addColumn('action', function ($employee) {
          return '
          <a href="' . route('admin.employee.edit', $employee->id) . '" class="btn btn-primary btn-sm" title="Edit"><i class="fa-solid fa-pen-to-square"></i></a>
          <a href="' . route('admin.employee.show', $employee->id) . '" class="btn btn-info btn-sm" title="View"><i class="fa-solid fa-up-right-from-square"></i></a>
          ';
        })
        ->addColumn('status', function ($employee) {
          return '
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" ' . ($employee->status == 1 ? 'checked' : '') . '>
          </div>
          ';
        })
        ->rawColumns(['action', 'status'])
        ->make(true);
    }
    // $employees = Employee::select(['id', 'employee_code', 'name', 'email', 'employee_designation_id', 'branch_id'])->with(['contact:id,employee_id,own_phone', 'employee_designation:id,designation', 'branch:id,branch_name'])->get();
    // return $employees;
    return view('admin.pages.employee.index');
  }
}
