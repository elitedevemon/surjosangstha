<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee\Attendance;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
  public function punchIn(Request $request)
  {
    $userId = Auth::id();
    $today = Carbon::today();
    // Check if the user has already punched in today
    $existingPunch = Attendance::where('user_id', $userId)
      ->whereDate('punch_in_time', $today)
      ->first();

    if ($existingPunch) {
      return response()->json([
        'status' => 'error',
        'message' => 'You have already punched in today.',
        'punch_in_time' => $existingPunch->punch_in_time
      ], 409); // 409 Conflict
    }

    // If not already punched in, save new punch-in time
    $attendance = new Attendance();
    $attendance->user_id = Auth::id();
    $attendance->punch_in_time = Carbon::now();
    $attendance->save();

    return response()->json([
      'status' => 'success',
      'punch_in_time' => $attendance->punch_in_time
    ]);
  }

  public function punchOut(Request $request)
  {
    $attendance = Attendance::where('user_id', Auth::id())->latest()->first();

    if (!$attendance || $attendance->punch_out_time) {
      return response()->json(['status' => 'error', 'message' => 'No active session found']);
    }

    $attendance->punch_out_time = Carbon::now();
    $attendance->total_hours = $attendance->punch_out_time->diff($attendance->punch_in_time)->format('%H:%I:%S');
    $attendance->production_hours = $attendance->punch_out_time->diffInMinutes($attendance->punch_in_time) / 60; // Convert to hours
    $attendance->save();

    return response()->json([
      'status' => 'success',
      'total_hours' => $attendance->total_hours,
      'production_hours' => round($attendance->production_hours, 2)
    ]);
  }
}
