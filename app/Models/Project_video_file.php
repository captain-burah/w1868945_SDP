<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project_video_file extends Model
{
    use HasFactory;

    public function project_video(): BelongsTo
    {
        return $this->belongsTo(Project_video::class);
    }
}
