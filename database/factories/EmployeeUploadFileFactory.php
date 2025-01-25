<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EmployeeUploadFile>
 */
class EmployeeUploadFileFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      //employee_id, own_photo, own_nid_front, own_nid_back, father_photo, father_nid_front, father_nid_back, mother_photo, mother_nid_front, mother_nid_back, guarantor_1_photo, guarantor_1_nid_front, guarantor_1_nid_back, guarantor_2_photo, guarantor_2_nid_front, guarantor_2_nid_back, nominee_photo, nominee_nid_front, nominee_nid_back
      'employee_id' => $this->faker->randomElement(Employee::pluck('id')->toArray()),
      'own_photo' => $this->faker->imageUrl(),
      'own_nid_front' => $this->faker->imageUrl(),
      'own_nid_back' => $this->faker->imageUrl(),
      'father_photo' => $this->faker->imageUrl(),
      'father_nid_front' => $this->faker->imageUrl(),
      'father_nid_back' => $this->faker->imageUrl(),
      'mother_photo' => $this->faker->imageUrl(),
      'mother_nid_front' => $this->faker->imageUrl(),
      'mother_nid_back' => $this->faker->imageUrl(),
      'guarantor_1_photo' => $this->faker->imageUrl(),
      'guarantor_1_nid_front' => $this->faker->imageUrl(),
      'guarantor_1_nid_back' => $this->faker->imageUrl(),
      'guarantor_2_photo' => $this->faker->imageUrl(),
      'guarantor_2_nid_front' => $this->faker->imageUrl(),
      'guarantor_2_nid_back' => $this->faker->imageUrl(),
      'nominee_photo' => $this->faker->imageUrl(),
      'nominee_nid_front' => $this->faker->imageUrl(),
      'nominee_nid_back' => $this->faker->imageUrl(),
    ];
  }
}
