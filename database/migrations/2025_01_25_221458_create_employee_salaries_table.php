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
    //employee_id, basic_salary, house_rent, medical_allowance, route_allowance, phone_bill, special_allowance, festive_bonus
    Schema::create('employee_salaries', function (Blueprint $table) {
      $table->id();
      $table->foreignId('employee_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
      $table->string('basic_salary');
      $table->string('house_rent');
      $table->string('medical_allowance');
      $table->string('route_allowance');
      $table->string('phone_bill');
      $table->string('special_allowance')->nullable();
      $table->string('festive_bonus')->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('employee_salaries');
  }
};
