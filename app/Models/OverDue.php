<?php

namespace App\Models;

use App\Models\Admin\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OverDue extends Model
{
  protected $guarded = [];
  protected $casts = [
    'due_paid_date' => 'date',
  ];

  public function customer(): BelongsTo
  {
    return $this->belongsTo(Customer::class);
  }

  public function employee(): BelongsTo
  {
    return $this->belongsTo(Employee::class);
  }
}
