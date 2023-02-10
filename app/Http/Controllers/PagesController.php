<?php

namespace App\Http\Controllers;

use App\Extensions\Controller;
use App\Services\Api;
use Inertia\Response;

class PagesController extends Controller
{
    public function home(Api $api): Response
    {
        $languageId = 5; // TODO : replace wit the actual current language's ID

        return inertia('Home', [
            'languages' => $api->get('languages')->json(),
            'learnable' => $api->get("languages/$languageId/learnable")->json(),
        ]);
    }

    public function learn(): Response
    {
        return inertia('Learn');
    }

    public function practice(): Response
    {
        return inertia('Practice');
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
