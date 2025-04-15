<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
  public function store(Request $request)
  {
    $request->validate([
      "task" => "required|string|max:255",
      "location" => "required|string|max:255",
    ]);

    try {
      Location::create($request->all());
      return response()->json([
        'status' => true,
        'message' => 'Location updated successfully',
      ]);
    } catch (\Throwable $th) {
      return response()->json([
        'status' => false,
        'message' => 'Failed to update location',
      ]);
    }
  }
}
