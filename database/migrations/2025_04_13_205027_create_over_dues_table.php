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
    Schema::create('over_dues', function (Blueprint $table) {
      $table->id();
      $table->foreignId('customer_id')->constrained()->onDelete('cascade');
      $table->string('amount');
      $table->date('due_paid_date');
      $table->enum('paid_status', ['paid', 'pending'])->default('pending'); 
      $table->enum('od_status', ['new', 'block'])->default('new');
      $table->foreignId('employee_id')->constrained()->onDelete('cascade');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('over_dues');
  }
};
