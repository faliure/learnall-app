<?php

namespace App\Http\Controllers;

use App\Extensions\Controller;
use App\Services\Api;

class PagesController extends Controller
{
    public function home(Api $api)
    {
        return inertia('Home', [
            'languages' => $api->get('languages')->json(),
        ]);
    }

    public function learn(Api $api)
    {
        return inertia('Learn', [
            'units' => $api->get('units')->json(),
        ]);
    }

    public function practice(Api $api)
    {
        $languageId = 5; // TODO : replace withe actual current language ID

        return inertia('Practice', [
            'word' => $api->get("languages/$languageId/word")->json(),
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
