<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Broker extends Model
{
    use HasFactory;

    public function broker_files(): HasMany
    {
        return $this->hasMany(BrokerFile::class);
    }

    public function broker_agents(): HasMany
    {
        return $this->hasMany(BrokerAgent::class);
    }

    public function unit_broker(): HasOne
    {
        return $this->HasOne(UnitBroker::class);
    }

    public function bookingbrokers(): HasMany
    {
        return $this->hasMany(BookingBroker::class);
    }
}
