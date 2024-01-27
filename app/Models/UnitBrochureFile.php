<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UnitBrochureFile extends Model
{
    use HasFactory;

    public function unit_brochure(): BelongsTo
    {
        return $this->belongsTo(Unit_brochure::class);
    }
}
