<?php

namespace App\Http\Controllers;

use App\Extensions\Controller;
use App\Repositories\CourseRepository;
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

    public function courses(CourseRepository $coursesRepo): Response
    {
        $courses = $coursesRepo->all(
            withRelations: [ 'language', 'fromLanguage' ],
            withCounters: [ 'units' ],
        );

        return inertia('Secondary/SelectCourse', [
            'courses' => $courses,
        ]);
    }

    public function unit(Api $api, string $unitId): Response
    {
        return inertia('Unit', [
            'unit' => $api->get("units/$unitId", [
                'withRelations' => [ 'lessons' ],
            ])->json(),
        ]);
    }

    public function lesson(Api $api, int $lessonId): Response
    {
        return inertia('Lesson', [
            'lesson' => $api->get("lessons/$lessonId")->json(),
        ]);
    }
}
