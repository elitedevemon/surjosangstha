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
    //employee_id, own_photo, own_nid_front, own_nid_back, father_photo, father_nid_front, father_nid_back, mother_photo, mother_nid_front, mother_nid_back, guarantor_1_photo, guarantor_1_nid_front, guarantor_1_nid_back, guarantor_2_photo, guarantor_2_nid_front, guarantor_2_nid_back, nominee_photo, nominee_nid_front, nominee_nid_back
    Schema::create('employee_upload_files', function (Blueprint $table) {
      $table->id();
      $table->foreignId('employee_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
      $table->string('own_photo')->nullable();
      $table->string('own_nid_front')->nullable();
      $table->string('own_nid_back')->nullable();
      $table->string('father_photo')->nullable();
      $table->string('father_nid_front')->nullable();
      $table->string('father_nid_back')->nullable();
      $table->string('mother_photo')->nullable();
      $table->string('mother_nid_front')->nullable();
      $table->string('mother_nid_back')->nullable();
      $table->string('guarantor_1_photo')->nullable();
      $table->string('guarantor_1_nid_front')->nullable();
      $table->string('guarantor_1_nid_back')->nullable();
      $table->string('guarantor_2_photo')->nullable();
      $table->string('guarantor_2_nid_front')->nullable();
      $table->string('guarantor_2_nid_back')->nullable();
      $table->string('nominee_photo')->nullable();
      $table->string('nominee_nid_front')->nullable();
      $table->string('nominee_nid_back')->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('employee_upload_files');
  }
};
