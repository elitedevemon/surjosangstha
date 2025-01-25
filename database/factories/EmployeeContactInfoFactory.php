<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EmployeeContactInfo>
 */
class EmployeeContactInfoFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      //employee_id, own_phone, own_nid, father_phone, father_nid, mother_phone, mother_nid, guarantor_1_phone, guarantor_1_nid, guarantor_2_phone, guarantor_2_nid, nominee_phone, nominee_nid
      'employee_id' => $this->faker->randomElement(Employee::pluck('id')->toArray()),
      'own_phone' => $this->faker->phoneNumber,
      'own_nid' => $this->faker->randomNumber(8),
      'father_phone' => $this->faker->phoneNumber,
      'father_nid' => $this->faker->randomNumber(8),
      'mother_phone' => $this->faker->phoneNumber,
      'mother_nid' => $this->faker->randomNumber(8),
      'guarantor_1_phone' => $this->faker->phoneNumber,
      'guarantor_1_nid' => $this->faker->randomNumber(8),
      'guarantor_2_phone' => $this->faker->phoneNumber,
      'guarantor_2_nid' => $this->faker->randomNumber(8),
      'nominee_phone' => $this->faker->phoneNumber,
      'nominee_nid' => $this->faker->randomNumber(8),
    ];
  }
}
