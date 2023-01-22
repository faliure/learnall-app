<?php

namespace App\Models;

use App\Models\Validators\Validator;
use Illuminate\Database\Eloquent\Model as EloquentModel;

class Model extends EloquentModel
{
    use Validator;

    protected $guarded = [];
}