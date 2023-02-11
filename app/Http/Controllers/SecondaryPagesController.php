<?php

namespace App\Http\Controllers;

use App\Extensions\Controller;
use App\Services\Api;
use Inertia\Response;

class SecondaryPagesController extends Controller
{
    public function login(): Response
    {
        return inertia('Auth/Login', [
            'status' => session('status'),
        ]);
    }

    public function register(): Response
    {
        return inertia('Auth/Register');
    }

    public function courses(Api $api): Response
    {
        $courses = $api->get('courses', [
            'with'  => [ 'language', 'fromLanguage' ],
            'count' => [ 'units' ],
        ])->json();

        return inertia('Secondary/SelectCourse', [
            'courses' => $courses,
        ]);
    }

    public function units(Api $api, int $unitId): Response
    {
        return inertia('Unit', [
            'unit' => $api->get("units/$unitId")->json(),
        ]);
    }

    public function lessons(Api $api, int $lessonId): Response
    {
        return inertia('Lesson', [
            'lesson' => $api->get("lessons/$lessonId")->json(),
        ]);
    }
}
