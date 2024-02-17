<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WebsiteGallery extends Model
{
    use HasFactory;

    public function website_gallery_medias(): HasMany
    {
        return $this->hasMany(WebsiteGalleryMedia::class, 'gallery_id');
    }
}
