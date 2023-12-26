<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UnitPaymentplanFile extends Model
{
    use HasFactory;

    public function unit_paymentplan(): BelongsTo
    {
        return $this->belongsTo(unit_paymentplan::class);
    }
}
