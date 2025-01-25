<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Branch>
 */
class BranchFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      //branch_name, branch_code, branch_address
      'branch_name' => $this->faker->name,
      'branch_code' => $this->faker->unique()->randomNumber(5),
      'branch_address' => $this->faker->address,
    ];
  }
}
