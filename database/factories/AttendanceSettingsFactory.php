<?php

namespace Database\Factories;

use App\Models\Admin\AttendanceSettings;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin\AttendanceSettings>
 */
class AttendanceSettingsFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      'enable_attendance' => true,
      'office_start' => '09:00',
      'office_end' => '18:00',
      'punch_in_earliest' => '08:30',
      'punch_in_latest' => '10:00',
      'grace_period' => 15,
      'half_day_after_hours' => 4,
      'auto_attendance' => false,
      'working_days' => json_encode(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Saturday', 'Sunday']),
      'weekend_days' => json_encode(['Friday', 'Saturday']),
      'disable_on_holidays' => true,
      'created_at' => now(),
      'updated_at' => now(),
    ];
  }
}
