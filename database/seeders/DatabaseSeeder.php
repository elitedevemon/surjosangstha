<?php

namespace Database\Seeders;

use App\Http\Controllers\EmployeeController;
use App\Models\Branch;
use App\Models\Employee;
use App\Models\EmployeeAddress;
use App\Models\EmployeeContactInfo;
use App\Models\EmployeeDesignation;
use App\Models\EmployeeSalary;
use App\Models\EmployeeUploadFile;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    // User::factory(10)->create();
    Branch::factory(5)->create();
    EmployeeDesignation::factory(5)->create();
    Employee::factory(50)->create();
    EmployeeContactInfo::factory(50)->create();
    EmployeeUploadFile::factory(50)->create();
    EmployeeAddress::factory(count: 50)->create();
    EmployeeSalary::factory(50)->create();

    // User::factory()->create([
    //     'name' => 'Test User',
    //     'email' => 'test@example.com',
    // ]);
  }
}
