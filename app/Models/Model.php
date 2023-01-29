<?php

namespace App\Models;

use App\Contracts\JsonResourceable as JsonResourceableContract;
use App\Models\Traits\JsonResourceable;
use App\Models\Traits\LazyRelations;
use App\Models\Validators\Validator;
use Illuminate\Database\Eloquent\Model as EloquentModel;

class Model extends EloquentModel implements JsonResourceableContract
{
    use JsonResourceable;
    use LazyRelations;
    use Validator;

    protected $guarded = [];
}
