<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EmployeeSalary>
 */
class EmployeeSalaryFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      //employee_id, basic_salary, house_rent, medical_allowance, route_allowance, phone_bill, special_allowance, festive_bonus
      'employee_id' => $this->faker->randomElement(Employee::pluck('id')->toArray()),
      'basic_salary' => $this->faker->numberBetween( 10000, 50000),
      'house_rent' => $this->faker->numberBetween( 10000, 50000),
      'medical_allowance' => $this->faker->numberBetween( 10000, 50000),
      'route_allowance' => $this->faker->numberBetween( 10000, 50000),
      'phone_bill' => $this->faker->numberBetween( 10000, 50000),
      'special_allowance' => $this->faker->numberBetween( 10000, 50000),
      'festival_bonus' => $this->faker->numberBetween( 10000, 50000),
      'total_salary' => $this->faker->numberBetween( 10000, 50000),
    ];
  }
}
