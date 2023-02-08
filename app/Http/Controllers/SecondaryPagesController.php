<?php

namespace App\Http\Controllers;

use App\Extensions\Controller;
use App\Services\Api;

class SecondaryPagesController extends Controller
{
    public function units(Api $api, int $unitId)
    {
        return inertia('Unit', [
            'unit' => $api->get("units/$unitId")->json(),
        ]);
    }

    public function lessons(Api $api, int $lessonId)
    {
        return inertia('Lesson', [
            'lesson' => $api->get("lessons/$lessonId")->json(),
        ]);
    }
}
