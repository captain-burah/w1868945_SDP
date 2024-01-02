<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use HasFactory;

    public function bookingclients(): HasMany
    {
        return $this->hasMany(BookingClient::class);
    }

    public function bookingbrokers(): HasMany
    {
        return $this->hasMany(BookingBroker::class);
    }

    public function unit(): BelongsTo
    {
        return $this->BelongsTo(Unit::class, 'unit_id');
    }
}