<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ODReportController extends Controller
{
  public function index()
  {
    return view("admin.pages.reports.od-reports.index");
  }
}
