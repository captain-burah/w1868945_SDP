<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Project_brochure_file extends Model
{
    use HasFactory;

    public function project_brochure(): BelongsTo
    {
        return $this->belongsTo(Project_brochure::class);
    }



}
