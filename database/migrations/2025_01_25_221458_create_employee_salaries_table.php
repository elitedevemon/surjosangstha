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
      $table->string('house_rent')->comment('35%');
      $table->string('medical_allowance')->comment('10%');
      $table->string('route_allowance')->comment('35%');
      $table->string('phone_bill')->comment('20%');
      $table->string('festival_bonus')->nullable()->comment('50%');
      $table->string('special_allowance')->nullable();
      $table->string('total_salary')->comment('total amount');
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
