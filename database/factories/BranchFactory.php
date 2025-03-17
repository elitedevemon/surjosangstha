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
      'branch_name' => 'Shelaidah',
      'branch_code' => 'SHL-001',
      'branch_address' => '7010, Shelaidah, Kumarkhali, Kushtia'
    ];
  }
}
