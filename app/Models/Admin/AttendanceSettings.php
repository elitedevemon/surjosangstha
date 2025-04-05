<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceSettings extends Model
{
  /** @use HasFactory<\Database\Factories\AttendanceSettingsFactory> */
  use HasFactory;
  protected $fillable = [
    'enable_attendance',
    'office_start',
    'office_end',
    'punch_in_earliest',
    'punch_in_latest',
    'grace_period',
    'half_day_after_hours',
    'auto_attendance',
    'working_days',
    'weekend_days',
    'disable_on_holidays',
  ];

  protected $casts = [
    'enable_attendance' => 'boolean',
    'auto_attendance' => 'boolean',
    'disable_on_holidays' => 'boolean',
    'working_days' => 'array',
    'weekend_days' => 'array',
  ];
}
