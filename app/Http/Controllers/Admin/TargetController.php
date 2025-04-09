<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Employee;
use Illuminate\Http\Request;

class TargetController extends Controller
{
  public function index()
  {
    $branches = Branch::all();
    $employees = Employee::all();
    return view('admin.pages.target.index', compact('branches', 'employees'));
  }
}
