<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DailyReportController extends Controller
{
  public function index()
  {
    return view("admin.pages.reports.daily-report.index");
  }
}
