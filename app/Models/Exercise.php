<?php

namespace App\Models;

use App\Models\Pivots\ExerciseLesson;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Exercise extends Model
{
    use HasFactory;

    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class);
    }

    public function lessons(): BelongsToMany
    {
        return $this->belongsToMany(Lesson::class)->using(ExerciseLesson::class);
    }

    public function units(): Builder
    {
        $lessonIdsBuilder = $this->lessons()->select('id');

        return Unit::whereHas(
            'lessons',
            fn ($q) => $q->whereIn('id', $lessonIdsBuilder)
        );
    }

    public function getUnitsAttribute(): Collection
    {
        return Unit::find($this->lessons()->pluck('unit_id'));
    }
}
