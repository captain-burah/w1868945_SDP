<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UnitImageFile extends Model
{
    use HasFactory;

    public function unit_image(): BelongsTo
    {
        return $this->belongsTo(Unit_image::class);
    }
}
