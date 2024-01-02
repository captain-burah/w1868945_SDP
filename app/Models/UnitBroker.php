<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitBroker extends Model
{
    use HasFactory;

    public function units(): HasMany
    {
        return $this->HasMany(Unit::class);
    }

    public function brokers(): HasMany
    {
        return $this->HasMany(Brokers::class);
    }
}
