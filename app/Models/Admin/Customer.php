<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
  protected $guarded = [];

  public function group()
  {
    return $this->belongsTo(Groups::class);
  }
}
