<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WebsiteNew extends Model
{
    use HasFactory;

    public function website_news_images(): HasMany
    {
        return $this->hasMany(WebsiteNewsImage::class, 'news_id');
    }
}
