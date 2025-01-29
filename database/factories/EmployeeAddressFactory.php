<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EmployeeAddress>
 */
class EmployeeAddressFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      //employee_id, own_village, own_union, own_post_office, own_thana, own_district, father_village, father_union, father_post_office, father_thana, father_district, mother_village, mother_union, mother_post_office, mother_thana, mother_district, guarantor_1_village, guarantor_1_union, guarantor_1_post_office, guarantor_1_thana, guarantor_1_district, guarantor_2_village, guarantor_2_union, guarantor_2_post_office, guarantor_2_thana, guarantor_2_district, nominee_relation, nominee_village, nominee_union, nominee_post_office, nominee_thana, nominee_district
      'employee_id' => $this->faker->randomElement(Employee::pluck('id')->toArray()),
      'own_village' => $this->faker->word,
      'own_union' => $this->faker->word,
      'own_post_office' => $this->faker->word,
      'own_thana' => $this->faker->word,
      'own_district' => $this->faker->word,
      'father_village' => $this->faker->word,
      'father_union' => $this->faker->word,
      'father_post_office' => $this->faker->word,
      'father_thana' => $this->faker->word,
      'father_district' => $this->faker->word,
      'mother_village' => $this->faker->word,
      'mother_union' => $this->faker->word,
      'mother_post_office' => $this->faker->word,
      'mother_thana' => $this->faker->word,
      'mother_district' => $this->faker->word,
      'guarantor_1_name' => $this->faker->name,
      'guarantor_1_village' => $this->faker->word,
      'guarantor_1_union' => $this->faker->word,
      'guarantor_1_post_office' => $this->faker->word,
      'guarantor_1_thana' => $this->faker->word,
      'guarantor_1_district' => $this->faker->word,
      'guarantor_2_name' => $this->faker->name,
      'guarantor_2_village' => $this->faker->word,
      'guarantor_2_union' => $this->faker->word,
      'guarantor_2_post_office' => $this->faker->word,
      'guarantor_2_thana' => $this->faker->word,
      'guarantor_2_district' => $this->faker->word,
      'nominee_name' => $this->faker->name,
      'nominee_relation' => $this->faker->word,
      'nominee_village' => $this->faker->word,
      'nominee_union' => $this->faker->word,
      'nominee_post_office' => $this->faker->word,
      'nominee_thana' => $this->faker->word,
      'nominee_district' => $this->faker->word,
    ];
  }
}
