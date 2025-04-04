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
    //branch_name, branch_code, branch_address
    Schema::create('branches', function (Blueprint $table) {
      $table->id();
      $table->string('branch_name');
      $table->string('branch_code')->unique();
      $table->string('branch_address');
      $table->enum('status', ['active', 'inactive'])->default('active');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('branches');
  }
};
