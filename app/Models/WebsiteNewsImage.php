<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WebsiteNewsImage extends Model
{
    use HasFactory;

    public function website_new(): BelongsTo
    {
        return $this->belongsTo(WebsiteNew::class);
    }
}
