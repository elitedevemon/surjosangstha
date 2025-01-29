<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EmployeeSalaryHistory>
 */
class EmployeeSalaryHistoryFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      // employee_id, salary, special_allowance, festival_bonus, total_salary
      'employee_id' => $this->faker->randomElement(Employee::pluck('id')->toArray()),
      'salary' => $this->faker->numberBetween(2, 20000),
      'special_allowance' => $this->faker->numberBetween(2, 20000),
      'festival_bonus' => $this->faker->numberBetween(2, 20000),
      'total_salary' => $this->faker->numberBetween(2, 20000),
    ];
  }
}
