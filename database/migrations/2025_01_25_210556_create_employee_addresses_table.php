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
    //employee_id, own_village, own_union, own_post_office, own_thana, own_district, father_village, father_union, father_post_office, father_thana, father_district, mother_village, mother_union, mother_post_office, mother_thana, mother_district, guarantor_1_village, guarantor_1_union, guarantor_1_post_office, guarantor_1_thana, guarantor_1_district, guarantor_2_village, guarantor_2_union, guarantor_2_post_office, guarantor_2_thana, guarantor_2_district, nominee_relation, nominee_village, nominee_union, nominee_post_office, nominee_thana, nominee_district
    Schema::create('employee_addresses', function (Blueprint $table) {
      $table->id();
      $table->foreignId('employee_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
      $table->string('own_village');
      $table->string('own_union');
      $table->string('own_post_office');
      $table->string('own_thana');
      $table->string('own_district');
      $table->string('father_village')->nullable();
      $table->string('father_union')->nullable();
      $table->string('father_post_office')->nullable();
      $table->string('father_thana')->nullable();
      $table->string('father_district')->nullable();
      $table->string('mother_village')->nullable();
      $table->string('mother_union')->nullable();
      $table->string('mother_post_office')->nullable();
      $table->string('mother_thana')->nullable();
      $table->string('mother_district')->nullable();
      $table->string('guarantor_1_name')->nullable();
      $table->string('guarantor_1_village')->nullable();
      $table->string('guarantor_1_union')->nullable();
      $table->string('guarantor_1_post_office')->nullable();
      $table->string('guarantor_1_thana')->nullable();
      $table->string('guarantor_1_district')->nullable();
      $table->string('guarantor_2_name')->nullable();
      $table->string('guarantor_2_village')->nullable();
      $table->string('guarantor_2_union')->nullable();
      $table->string('guarantor_2_post_office')->nullable();
      $table->string('guarantor_2_thana')->nullable();
      $table->string('guarantor_2_district')->nullable();
      $table->string('nominee_relation');
      $table->string('nominee_name')->nullable();
      $table->string('nominee_village')->nullable();
      $table->string('nominee_union')->nullable();
      $table->string('nominee_post_office')->nullable();
      $table->string('nominee_thana')->nullable();
      $table->string('nominee_district')->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('employee_addresses');
  }
};
