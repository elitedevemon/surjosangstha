<?php

namespace Database\Factories;

use App\Models\Branch;
use App\Models\EmployeeDesignation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      //employee_code, email, designation_id, branch_id, name, father_name, mother_name, application_date, joining_date
      'employee_code' => $this->faker->numberBetween(99999, 9999999),
      'email' => $this->faker->safeEmail,
      'gender' => $this->faker->randomElement(['male', 'female']),
      'dob' => $this->faker->date,
      'religion' => $this->faker->word,
      'marital_status' => $this->faker->randomElement(['single','married','divorced','widowed' ]),
      'employee_designation_id' => $this->faker->randomElement(EmployeeDesignation::pluck('id')->toArray()),
      'branch_id' => $this->faker->randomElement(Branch::pluck('id')->toArray()),
      'name' => $this->faker->name,
      'father_name' => $this->faker->name,
      'mother_name' => $this->faker->name,
      'application_date' => $this->faker->date(),
      'joining_date' => $this->faker->date(),
    ];
  }
}
