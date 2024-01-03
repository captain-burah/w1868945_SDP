<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BrokerAgent extends Model
{
    use HasFactory;

    public function broker(): BelongsTo
    {
        return $this->belongsTo(Broker::class);
    }
}
