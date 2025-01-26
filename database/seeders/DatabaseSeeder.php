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
    EmployeeDesignation::factory(5)->create();
    Branch::factory(5)->create();
    Employee::factory(10)->create();
    EmployeeContactInfo::factory(10)->create();
    EmployeeUploadFile::factory(10)->create();
    EmployeeAddress::factory(10)->create();
    EmployeeSalary::factory(10)->create();

    // User::factory()->create([
    //     'name' => 'Test User',
    //     'email' => 'test@example.com',
    // ]);
  }
}
