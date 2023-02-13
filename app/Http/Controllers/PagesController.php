<?php

namespace App\Http\Controllers;

use App\Extensions\Controller;
use App\Services\Api;
use Inertia\Response;

class PagesController extends Controller
{
    public function home(Api $api): Response
    {
        $courses = $api->get('courses', [
            'withRelations' => [ 'language', 'fromLanguage' ],
            'withCounters'  => [ 'units' ],
        ])->json();

        return inertia('Home', [
            'courses' => $courses,
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
            'withRelations'  => [ 'translation'/*, 'translations' */ ],
                'count'          => 20,
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
