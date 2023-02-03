<?php

namespace App\Extensions\Laravel;

use App\Contracts\JsonResourceable as JsonResourceableContract;
use App\Models\Traits\JsonResourceable;
use App\Models\Traits\LazyRelations;
use App\Models\Validators\Validator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as EloquentModel;

class Model extends EloquentModel implements JsonResourceableContract
{
    use HasFactory;
    use JsonResourceable;
    use LazyRelations;
    use Validator;

    protected $guarded = [];

    public static function rand(...$filters): ?static
    {
        return static::query()
            ->when($filters, fn ($q, $filters) => $q->where(...$filters))
            ->inRandomOrder()
            ->first();
    }
}
