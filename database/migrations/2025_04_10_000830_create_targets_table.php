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
    Schema::create('targets', function (Blueprint $table) {
      $table->id();
      $table->foreignId('employee_id')->constrained()->onDelete('cascade');
      $table->integer('admission')->default(0);
      $table->integer('collection')->default(0);
      $table->integer('new_od')->default(0);
      $table->integer('od_realization')->default(0);
      $table->integer('savings')->default(0);
      $table->integer('disbursement')->default(0);
      $table->integer('late_od_realization')->default(0);
      $table->integer('loan_scheme')->default(0);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('targets');
  }
};
