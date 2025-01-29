<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Employee extends Model
{
  /** @use HasFactory<\Database\Factories\EmployeeFactory> */
  use HasFactory;

  /**
   * Method employee_contact_info
   * description: This method is used to get the employee_contact_info information of the employee
   * @return HasOne
   */

  protected $guarded = [];

  
  public function contact(): HasOne
  {
    return $this->hasOne(EmployeeContactInfo::class);
  }

  public function address(): HasOne
  {
    return $this->hasOne(EmployeeAddress::class);
  }

  public function salary(): HasOne
  {
    return $this->hasOne(EmployeeSalary::class);
  }

  public function upload_file(): HasOne
  {
    return $this->hasOne(EmployeeUploadFile::class);
  }

  public function education_detail(): HasOne
  {
    return $this->hasOne(EmployeeEducationDetail::class);
  }

  /**
   * Method employee_designation
   * description: This method is used to get the employee_designation of the employee
   * @return BelongsTo
   */
  public function employee_designation(): BelongsTo
  {
    return $this->belongsTo(EmployeeDesignation::class);
  }

  public function branch(): BelongsTo
  {
    return $this->belongsTo(Branch::class);
  }
}
