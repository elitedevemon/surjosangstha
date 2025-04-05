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
    Schema::create('attendance_settings', function (Blueprint $table) {
      $table->id();
      $table->time('office_start');
      $table->time('office_end');
      $table->time('punch_in_earliest');
      $table->time('punch_in_latest');
      $table->integer('grace_period')->default(0);
      $table->boolean('auto_attendance')->default(false);
      $table->integer('half_day_after_hours')->default(4);
      $table->json('working_days');
      $table->json('weekend_days');
      $table->boolean('disable_on_holidays')->default(true);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('attendance_settings');
  }
};
