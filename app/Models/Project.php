<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Project extends Model
{
    use HasFactory;

    public function project_brochure(): HasOne
    {
        return $this->hasOne(Project_brochure::class);
    }

    public function project_image(): HasOne
    {
        return $this->hasOne(Project_image::class);
    }

    public function project_factsheet(): HasOne
    {
        return $this->hasOne(Project_factsheet::class);
    }

    public function project_video(): HasOne
    {
        return $this->hasOne(Project_video::class);
    }

    public function project_translations(): HasMany
    {
        return $this->hasMany(Project_translation::class);
    }

    public function project_type(): HasOne
    {
        return $this->hasOne(Project_type::class);
    }

    public function units(): HasMany
    {
        return $this->hasMany(Unit::class);
    }
}
