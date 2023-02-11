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
            'with'  => [ 'language', 'fromLanguage' ],
            'count' => [ 'units' ],
        ])->json();

        return inertia('Home', compact('courses'));
    }

    public function learn(): Response
    {
        return inertia('Learn');
    }

    public function practice(Api $api): Response
    {
        $languageId = 5; // TODO : replace wit the actual current language's ID

        return inertia('Practice', [
            'languages' => $api->get('languages')->json(),
            'learnable' => $api->get("languages/$languageId/learnable")->json(),
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
