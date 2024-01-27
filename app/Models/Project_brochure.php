<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project_brochure extends Model
{
    use HasFactory;

    public function project_brochure_files(): HasMany
    {
        return $this->hasMany(Project_brochure_file::class);
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

}
