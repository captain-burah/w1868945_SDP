<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WebsiteConstructionImage extends Model
{
    use HasFactory;
    public function website_construction(): BelongsTo
    {
        return $this->belongsTo(WebsiteConstruction::class);
    }
}
