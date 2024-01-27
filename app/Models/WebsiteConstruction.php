<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WebsiteConstruction extends Model
{
    use HasFactory;

    public function website_construction_images(): HasMany
    {
        return $this->hasMany(WebsiteConstructionImage::class, 'construction_id');
    }
}
