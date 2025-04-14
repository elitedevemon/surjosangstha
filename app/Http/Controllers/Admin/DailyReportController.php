<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\OverDue;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DailyReportController extends Controller
{
  public function index()
  {
    $employees = Employee::with(['overdues' => function ($query) {
      $query->whereDate('created_at', Carbon::today())
      ->orWhereDate('updated_at', Carbon::today());
    }])->select('id', 'name', 'branch_id')->get();

    return view("admin.pages.reports.daily-report.index", compact('employees'));
  }
}
