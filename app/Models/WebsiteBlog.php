<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WebsiteBlog extends Model
{
    use HasFactory;

    public function website_blogs_images(): HasMany
    {
        return $this->hasMany(WebsiteBlogsImage::class, 'blogs_id');
    }
}
