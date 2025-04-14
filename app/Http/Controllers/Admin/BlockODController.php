<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Customer;
use Illuminate\Http\Request;

class BlockODController extends Controller
{
  public function index()
  {
    $customers = Customer::where('od_status', 'block')->where('status', 'active')->paginate(10);
    return view("admin.pages.reports.block-od.index", compact('customers'));
  }
}
