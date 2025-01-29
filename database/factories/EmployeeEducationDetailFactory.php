<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EmployeeEducationDetail>
 */
class EmployeeEducationDetailFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      'employee_id' => $this->faker->randomElement(Employee::pluck('id')->toArray()),
      'institution_name' => $this->faker->word,
      'degree' => $this->faker->word,
      'start_date' => $this->faker->date,
      'end_date' => $this->faker->date
    ];
  }
}
