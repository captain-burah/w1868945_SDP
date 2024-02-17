<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WebsiteGalleryMedia extends Model
{
    use HasFactory;

    public function website_gallery(): BelongsTo
    {
        return $this->belongsTo(WebsiteGallery::class);
    }
}
