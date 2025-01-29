<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    // employee_id, salary, special_allowance, festival_bonus, total_salary
    Schema::create('employee_salary_histories', function (Blueprint $table) {
      $table->id();
      $table->foreignId('employee_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
      $table->integer('salary');
      $table->integer('special_allowance')->nullable();
      $table->integer('festival_bonus')->nullable()->comment('50%');
      $table->integer('total_salary');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('employee_salary_histories');
  }
};
