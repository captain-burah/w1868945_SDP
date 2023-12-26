<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    public function project_translations(): HasMany
    {
        return $this->hasMany(Project_translation::class);
    }
}
