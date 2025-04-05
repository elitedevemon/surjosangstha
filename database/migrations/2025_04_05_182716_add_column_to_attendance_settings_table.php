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
    Schema::table('attendance_settings', function (Blueprint $table) {
      $table->boolean('enable_attendance')->default(false)->after('id')->comment('Enable or disable attendance system');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::table('attendance_settings', function (Blueprint $table) {
      $table->dropColumn('enable_attendance');
    });
  }
};
