<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\AttendanceSettings;
use App\Models\User;
use Illuminate\Http\Request;
use Throwable;

class AttendanceController extends Controller
{
  public function index()
  {
    $total_employees = User::where('role', 'employee')->count();
    $today = now()->format('Y-m-d');
    $today_attendance = User::where('role', 'employee')
      ->whereHas('attendance', function ($query) use ($today) {
        $query->whereDate('created_at', $today);
      })
      ->count();
    $today_absent = $total_employees - $today_attendance;
    $today_late = User::where('role', 'employee')
      ->whereHas('attendance', function ($query) use ($today) {
        $query->whereDate('created_at', $today)
          ->where('status', 'late');
      })
      ->count();
    // $today_half_day = User::where('role', 'employee')
    //   ->whereHas('attendance', function ($query) use ($today) {
    //     $query->whereDate('created_at', $today)
    //       ->where('status', 'half_day');
    //   })
    //   ->count();
    
    // $today_present = User::where('role', 'employee')
    //   ->whereHas('attendance', function ($query) use ($today) {
    //     $query->whereDate('created_at', $today)
    //       ->where('status', 'present');
    //   })
    //   ->count();
    $today_leave = User::where('role', 'employee')
      ->whereHas('attendance', function ($query) use ($today) {
        $query->whereDate('created_at', $today)
          ->where('status', 'leave');
      })
      ->count();
    return view('admin.pages.attendance.index', compact('total_employees'));
  }

  public function settings()
  {
    // Assuming there's only one row for settings
    $settings = AttendanceSettings::firstOrNew();
    $settings->working_days = json_decode($settings->working_days ?? '[]', true);
    $settings->weekend_days = json_decode($settings->weekend_days ?? '[]', true);

    return view('admin.pages.attendance.attendance-settings', compact('settings'));
  }

  public function updateSettings(Request $request)
  {
    // return $request->disable_on_holidays;
    $request->validate([
      'office_start' => 'required|date_format:H:i',
      'office_end' => 'required|date_format:H:i|after:office_start',
      'punch_in_earliest' => 'required|date_format:H:i',
      'punch_in_latest' => 'required|date_format:H:i|after:punch_in_earliest',
      'grace_period' => 'required|integer|min:0',
      'half_day_after_hours' => 'required|integer|min:1|max:12',
      'auto_attendance' => 'required|boolean',
      'working_days' => 'required|array',
      'weekend_days' => 'nullable|array',
      'disable_on_holidays' => 'nullable|boolean',
    ]);


    try {
      $settings = AttendanceSettings::firstOrNew();

      $settings->enable_attendance = $request->has('enable_attendance');
      $settings->office_start = $request->office_start;
      $settings->office_end = $request->office_end;
      $settings->punch_in_earliest = $request->punch_in_earliest;
      $settings->punch_in_latest = $request->punch_in_latest;
      $settings->grace_period = $request->grace_period;
      $settings->half_day_after_hours = $request->half_day_after_hours;
      $settings->auto_attendance = $request->auto_attendance;
      $settings->working_days = json_encode($request->working_days);
      $settings->weekend_days = json_encode($request->weekend_days ?? []);
      $settings->disable_on_holidays = $request->has('disable_on_holidays');

      $settings->save();

      toastr()->success('Attendance settings updated successfully!');
      return redirect()->back()->with('success', 'Attendance settings updated successfully!');
    } catch (Throwable $th) {
      // Handle the error
      return $th->getMessage();
      // toastr()->error('Failed to update attendance settings. Please try again.');
      // return redirect()->back()->with('error', 'Failed to update attendance settings. Please try again.');
    }

    
  }
}
