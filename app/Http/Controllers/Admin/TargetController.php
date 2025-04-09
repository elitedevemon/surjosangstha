<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Target;
use App\Models\Branch;
use App\Models\Employee;
use Illuminate\Http\Request;

class TargetController extends Controller
{
  public function index()
  {
    $employees = Employee::all();
    return view('admin.pages.target.index', compact('employees'));
  }

  public function check(Request $request)
  {
    $employee = Target::where('employee_id', $request->employee_id)->first();

    $html = view('admin.pages.target.partials.form', compact('employee'))->render();
    return response()->json(['status' => true, 'html' => $html]);
  }

  public function store(Request $request)
  {
    $request->validate([
      'employee_id' => 'required|exists:employees,id',
      'admission' => 'required|integer',
      'collection' => 'required|integer',
      'new_od' => 'required|integer',
      'od_realization' => 'required|integer',
      'savings' => 'required|integer',
      'disbursement' => 'required|integer',
      'late_od_realization' => 'required|integer',
      'loan_scheme' => 'required|integer',
    ]);

    $target = Target::updateOrCreate(
      ['employee_id' => $request->employee_id],
      [
        'admission' => $request->admission,
        'collection' => $request->collection,
        'new_od' => $request->new_od,
        'od_realization' => $request->od_realization,
        'savings' => $request->savings,
        'disbursement' => $request->disbursement,
        'late_od_realization' => $request->late_od_realization,
        'loan_scheme' => $request->loan_scheme,
      ],
    );
    if ($target) {
      return response()->json(['status' => true, 'message' => 'Target saved successfully']);
    } else {
      return response()->json(['status' => false, 'message' => 'Failed to save target']);
    }
    // dd($request->all());
  }
}
