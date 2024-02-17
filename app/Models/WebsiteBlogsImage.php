<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WebsiteBlogsImage extends Model
{
    use HasFactory;

    public function website_blog(): BelongsTo
    {
        return $this->belongsTo(WebsiteBlog::class);
    }
}
