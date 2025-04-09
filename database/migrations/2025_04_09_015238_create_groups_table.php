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
    Schema::create('groups', function (Blueprint $table) {
      $table->id();
      $table->foreignId('branch_id')->constrained()->onDelete('CASCADE')->onUpdate('CASCADE');
      $table->string('group_code');
      $table->string('group_name');
      $table->string('group_address');
      $table->foreignId('employee_id')->constrained()->onDelete('CASCADE')->onUpdate('CASCADE');
      $table->enum('status', ['active', 'inactive'])->default('active');
      $table->unique(['group_code','group_name']);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('groups');
  }
};
