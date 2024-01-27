<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project_factsheet_file extends Model
{
    use HasFactory;

    public function project_factsheet(): BelongsTo
    {
        return $this->belongsTo(Project_factsheet::class);
    }
}
