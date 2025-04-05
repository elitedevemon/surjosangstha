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
    Schema::table('attendances', function (Blueprint $table) {
      $table->string('late_duration')->nullable()->after('punch_out_time');
      $table->string('half_day_duration')->nullable()->after('late_duration');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::table('attendances', function (Blueprint $table) {
      $table->dropColumn('late_duration');
      $table->dropColumn('half_day_duration');
    });
  }
};
