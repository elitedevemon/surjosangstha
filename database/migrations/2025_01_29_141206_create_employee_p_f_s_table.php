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
    Schema::create('employee_p_f_s', function (Blueprint $table) {
      $table->id();
      $table->foreignId('employee_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
      $table->integer('amount')->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('employee_p_f_s');
  }
};
