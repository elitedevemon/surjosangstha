<?php

namespace App\Models\Admin;

use App\Models\Branch;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Groups extends Model
{
  protected $guarded = [];

  public function employee(): BelongsTo
  {
    return $this->belongsTo(Employee::class);
  }

  public function branch(): BelongsTo
  {
    return $this->belongsTo(Branch::class);
  }

  public function customer()
  {
    return $this->hasMany(Customer::class, 'group_id');
  }
}
