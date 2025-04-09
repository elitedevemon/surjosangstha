<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Target extends Model
{
  protected $guarded = [];
  protected $casts = [
    'admission' => 'integer',
    'collection' => 'integer',
    'new_od' => 'integer',
    'od_realization' => 'integer',
    'savings' => 'integer',
    'disbursement' => 'integer',
    'late_od_realization' => 'integer',
    'loan_scheme' => 'integer',
  ];
}
