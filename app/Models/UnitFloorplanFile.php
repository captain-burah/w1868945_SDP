<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UnitFloorplanFile extends Model
{
    use HasFactory;

    public function unit_floorplan(): BelongsTo
    {
        return $this->belongsTo(Unit_floorplan::class);
    }
}
