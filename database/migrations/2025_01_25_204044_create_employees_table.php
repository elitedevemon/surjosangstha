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
    //employee_code, email, designation, name, father_name, mother_name, application_date, joining_date
    Schema::create('employees', function (Blueprint $table) {
      $table->id();
      $table->string('employee_code')->unique();
      $table->string('email');
      $table->enum('gender', ['male', 'female'])->nullable();
      $table->date('dob')->nullable();
      $table->string('religion')->nullable();
      $table->enum('marital_status', ['single', 'married', 'divorced', 'widowed'])->default('single');
      $table->string('password')->default(bcrypt('password'));
      $table->foreignId('employee_designation_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
      $table->foreignId('branch_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
      $table->string('name');
      $table->string('father_name');
      $table->string('mother_name');
      $table->date('application_date');
      $table->date('joining_date');
      $table->enum('status', ['active', 'inactive'])->default('active');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('employees');
  }
};
