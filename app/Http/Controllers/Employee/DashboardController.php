<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\OverDue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
  public function index()
  {
    $attendance = Auth::user()->attendance()->whereDate('created_at', now())->whereNull('punch_out_time')->first();
    
    return view('employee.index', compact(['attendance']));
  }
}
