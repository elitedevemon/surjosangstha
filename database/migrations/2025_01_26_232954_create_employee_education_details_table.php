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
    Schema::create('employee_education_details', function (Blueprint $table) {
      $table->id();
      $table->foreignId('employee_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
      $table->string('institution_name');
      $table->string('degree');
      $table->string('start_date');
      $table->string('end_date');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('employee_education_details');
  }
};
