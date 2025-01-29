<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeePF extends Model
{
  /** @use HasFactory<\Database\Factories\EmployeePFFactory> */
  use HasFactory;

  /**
   * disable fillable properties guard
   * @var array
   */
  protected $guarded = [];
}
