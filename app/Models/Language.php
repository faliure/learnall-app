<?php

namespace App\Models;

use App\Enums\WordType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Language extends Model
{
    use HasFactory;

    public function words(): HasMany
    {
        return $this->hasMany(Word::class);
    }

    public function sentences(): HasMany
    {
        return $this->hasMany(Sentence::class);
    }

    public function expressions(): HasMany
    {
        return $this->hasMany(Word::class)
            ->where('type', WordType::Expression);
    }

    public function variants(): HasMany
    {
        return $this->hasMany(Language::class, 'name', 'name')
            ->where('id', '!=', $this->id);
    }

    public function getLongNameAttribute(): string
    {
        return $this->region ? "{$this->name} ({$this->region})" : $this->name;
    }
}
