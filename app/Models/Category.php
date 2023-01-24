<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Category extends Model
{
    use HasFactory;

    public function words(): MorphToMany
    {
        return $this->morphedByMany(Word::class, 'categorizable');
    }

    public function sentences(): MorphToMany
    {
        return $this->morphedByMany(Sentence::class, 'categorizable');
    }
}
