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
    Schema::create('vehicles', function (Blueprint $table) {
      $table->id();
      $table->string('owner_name');
      $table->string('mobile_number');
      $table->string('address');
      $table->foreignId('branch_id')->constrained()->onDelete('cascade');
      $table->enum('status', ['active', 'inactive'])->default('active');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('vehicles');
  }
};
