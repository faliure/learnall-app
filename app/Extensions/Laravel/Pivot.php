<?php

namespace App\Extensions\Laravel;

use Illuminate\Database\Eloquent\Relations\Pivot as BasePivot;

class Pivot extends BasePivot
{
    public $incrementing = true;
}
