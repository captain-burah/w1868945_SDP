<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Unit_floorplan extends Model
{
    use HasFactory;

    public function unit_floorplan_files(): HasMany
    {
        return $this->hasMany(UnitFloorplanFile::class);
    }

    // public function unit(): BelongsTo
    // {
    //     return $this->belongsTo(Unit::class);
    // }

    public function units(): HasMany
    {
        return $this->hasMany(Unit::class);
    }
}
