<?php

namespace App\Extensions\Laravel;

use App\Http\Controllers\Controller as BaseController;

class CrudController extends BaseController
{
    public function __construct()
    {
        /** TODO : implement Policies instead */
        $this->middleware('auth:sanctum')->except(['index', 'show']);
    }
}
