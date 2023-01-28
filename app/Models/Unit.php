<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Unit extends Model
{
    use HasFactory;

    public function language(): BelongsTo
    {
        return $this->belongsto(Language::class);
    }

    public function lessons(): HasMany
    {
        return $this->hasMany(Lesson::class);
    }

    public function exercises(): HasManyThrough
    {
        return $this->hasManyThrough(Exercise::class, Lesson::class);
    }
}
