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
    Schema::create('employee_dps', function (Blueprint $table) {
      $table->id();
      $table->foreignId('employee_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
      $table->integer('amount')->comment('dps_amount');
      $table->integer('rate')->comment('interest rate');
      $table->enum('validity', ['5', '8', '10'])->comment('dps validity');
      $table->enum('status', ['active', 'inactive', 'due', 'completed'])->default('active');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('employee_dps');
  }
};
