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
    //employee_id, own_phone, own_nid, father_phone, father_nid, mother_phone, mother_nid, guarantor_1_phone, guarantor_1_nid, guarantor_2_phone, guarantor_2_nid, nominee_phone, nominee_nid
    Schema::create('employee_contact_infos', function (Blueprint $table) {
      $table->id();
      $table->foreignId('employee_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
      $table->string('own_phone');
      $table->string('own_nid');
      $table->string('father_phone')->nullable();
      $table->string('father_nid')->nullable();
      $table->string('mother_phone')->nullable();
      $table->string('mother_nid')->nullable();
      $table->string('guarantor_1_phone')->nullable();
      $table->string('guarantor_1_nid')->nullable();
      $table->string('guarantor_2_phone')->nullable();
      $table->string('guarantor_2_nid')->nullable();
      $table->string('nominee_phone')->nullable();
      $table->string('nominee_nid')->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('employee_contact_infos');
  }
};
