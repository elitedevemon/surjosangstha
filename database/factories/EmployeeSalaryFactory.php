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
      'basic_salary' => $this->faker->randomFloat(2, 10000, 50000),
      'house_rent' => $this->faker->randomFloat(2, 1000, 5000),
      'medical_allowance' => $this->faker->randomFloat(2, 1000, 5000),
      'route_allowance' => $this->faker->randomFloat(2, 1000, 5000),
      'phone_bill' => $this->faker->randomFloat(2, 1000, 5000),
      'special_allowance' => $this->faker->randomFloat(2, 1000, 5000),
      'festive_bonus' => $this->faker->randomFloat(2, 1000, 5000),
    ];
  }
}
