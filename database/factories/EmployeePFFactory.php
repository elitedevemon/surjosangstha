<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EmployeePF>
 */
class EmployeePFFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      'employee_id' => $this->faker->randomElement(\App\Models\Employee::pluck('id')->toArray()),
      'amount' => $this->faker->numberBetween(500, 10000)
    ];
  }
}
