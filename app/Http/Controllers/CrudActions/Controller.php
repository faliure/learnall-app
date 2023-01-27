<?php

namespace App\Http\Controllers\CrudActions;

use App\Http\Controllers\Controller as BaseController;

class Controller extends BaseController
{
    public function __construct()
    {
        /** TODO : implement Policies instead */
        $this->middleware('auth:sanctum')->except(['index', 'show']);
    }
}
