<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Clientele extends Model
{
    use HasFactory;

    public function clientele_documents(): HasMany
    {
        return $this->hasMany(Clientele_document::class);
    }

    public function bookingclients(): HasMany
    {
        return $this->hasMany(BookingClient::class);
    }
    
    public function unit(): BelongsTo
    {
        return $this->BelongsTo(Unit::class, 'unit_id');
    }

}
