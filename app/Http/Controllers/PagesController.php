<?php

namespace App\Http\Controllers;

use App\Extensions\Controller;
use App\Repositories\CourseRepository;
use App\Services\Api;
use Inertia\Response;

class PagesController extends Controller
{
    public function home(CourseRepository $coursesRepo): Response
    {
        $courses = my('activeCourseId') ? null : $coursesRepo->all(
            withRelations: [ 'language', 'fromLanguage' ]
        );

        return inertia('Home', [
            'courses' => $courses,
            'course'  => $coursesRepo->active(withRelations: [ 'units' ]),
        ]);
    }

    public function learn(): Response
    {
        return inertia('Learn');
    }

    public function practice(Api $api): Response
    {
        return inertia('Practice', [
            'learnables' => $api->get('learnables/*', [
                'withRelations'  => [ 'translations' ],
                'count'          => 50,
            ])->json(),
        ]);
    }

    public function compete(): Response
    {
        return inertia('Compete');
    }

    public function explore(): Response
    {
        return inertia('Explore');
    }
}
