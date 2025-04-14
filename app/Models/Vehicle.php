<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vehicle extends Model
{
  protected $guarded = [];

  public function branch()
  {
    return $this->belongsTo(Branch::class);
  }

  public function bookings(): HasMany
  {
    return $this->hasMany(VehicleBooking::class);
  }
}
