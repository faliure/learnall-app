<?php

namespace App\Http\Controllers;

use App\Extensions\Controller;
use App\Services\Api;

class PagesController extends Controller
{
    public function home(Api $api)
    {
        $languageId = 5; // TODO : replace withe actual current language ID

        return inertia('Home', [
            'languages' => $api->get('languages')->json(),
            'learnable' => $api->get("languages/$languageId/learnable")->json(),
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
        return inertia('Practice');
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
