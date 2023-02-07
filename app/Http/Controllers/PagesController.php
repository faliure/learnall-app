<?php

namespace App\Http\Controllers;

use App\Extensions\Controller;
use App\Services\Api;

class PagesController extends Controller
{
    public function home(Api $api)
    {
        return inertia('Home', [
            'lanuages' => $api->get('languages'),
        ]);
    }

    public function learn(Api $api)
    {
        return inertia('Learn', [
            'units' => $api->get('units'),
        ]);
    }

    public function practice(Api $api)
    {
        $languageId = 5; // TODO : replace withe actual current language ID

        return inertia('Practice', [
            'word' => $api->get("languages/$languageId/word"),
        ]);
    }

    public function compete()
    {
        return inertia('Compete');
    }

    public function explore()
    {
        return inertia('Explore');
    }
}
