<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Admin\Customer;
use Illuminate\Http\Request;

class BlockCustomerController extends Controller
{
  public function index()
  {
    // Fetch the blocked customers from the database
    $customers = Customer::where('od_status', 'block')->orderBy('created_at', 'desc')->paginate(10);
    return view("employee.pages.customers.block_customer.index", compact("customers"));
  }
}
