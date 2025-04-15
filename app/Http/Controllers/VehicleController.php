<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\VehicleBooking;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VehicleController extends Controller
{
  public function index()
  {
    $vehicles = Vehicle::with(['branch:id,branch_name', 'bookings' => function($query){
      $query->whereDate('created_at', Carbon::today());
    }])->where('branch_id', Auth::user()->employee->branch_id)
    ->get();
    return view('employee.pages.vehicle.index', compact('vehicles'));
  }

  public function create()
  {
    return view('employee.pages.vehicle.create');
  }

  public function store(Request $request)
  {
    $request->validate( [
      'owner_name' => 'required|string|max:255',
      'mobile_number' => 'required|string|max:255',
      'address' => 'required|string|max:255',
      'branch_id' => 'required|exists:branches,id',
    ]);

    try {
      Vehicle::create($request->all());
      toastr()->success('Vehicle created successfully.');
      return redirect()->route('employee.vehicle.index');
    } catch (\Throwable $th) {
      toastr()->error('Failed to create vehicle.');
      return redirect()->back()->withInput();
    }
  }

  public function edit(Vehicle $vehicle)
  {
    return view('employee.pages.vehicle.edit', compact('vehicle'));
  }

  public function update(Request $request, Vehicle $vehicle)
  {
    $request->validate( [
      'owner_name' => 'required|string|max:255',
      'mobile_number' => 'required|string|max:255',
      'address' => 'required|string|max:255',
      'branch_id' => 'required|exists:branches,id',
    ]);

    try {
      $vehicle->update($request->all());
      toastr()->success('Vehicle updated successfully.');
      return redirect()->route('employee.vehicle.index');
    } catch (\Throwable $th) {
      toastr()->error('Failed to update vehicle.');
      return redirect()->back()->withInput();
    }
  }

  public function booking(Request $request)
  {
    $request->validate([
      'vehicle_id' => 'required|exists:vehicles,id',
      'employee_id' => 'required|exists:employees,id',
      'fare' => 'required|numeric|min:1',
    ]);

    try {
      VehicleBooking::create($request->all());
      return response()->json(['message' => 'Booking confirmed successfully!']);
    } catch (\Throwable $th) {
      return response()->json(['message' => 'Failed to confirm booking.'], 500);
    }

    
  }

  public function adminIndex()
  {
    $vehicles = Vehicle::with('branch:id,branch_name')->get();
    return view('admin.pages.vehicle.index', compact('vehicles'));
  }
}
