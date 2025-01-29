<?php

namespace Database\Seeders;

use App\Http\Controllers\EmployeeController;
use App\Models\Branch;
use App\Models\Employee;
use App\Models\EmployeeAddress;
use App\Models\EmployeeContactInfo;
use App\Models\EmployeeDesignation;
use App\Models\EmployeeEducationDetail;
use App\Models\EmployeePF;
use App\Models\EmployeeSalary;
use App\Models\EmployeeSalaryHistory;
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
    Branch::factory(3)->create();
    EmployeeDesignation::factory(3)->create();
    Employee::factory(5)->create();
    EmployeeContactInfo::factory(5)->create();
    EmployeeUploadFile::factory(5)->create();
    EmployeeAddress::factory(count: 5)->create();
    EmployeeSalary::factory(5)->create();
    EmployeeEducationDetail::factory(3)->create();
    EmployeePF::factory(2)->create();
    EmployeeSalaryHistory::factory(100)->create();

    // User::factory()->create([
    //     'name' => 'Test User',
    //     'email' => 'test@example.com',
    // ]);
  }
}
