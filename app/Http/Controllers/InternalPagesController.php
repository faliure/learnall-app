<?php

namespace App\Http\Controllers;

use App\Extensions\Controller;
use App\Services\Api;
use Inertia\Response;

class InternalPagesController extends Controller
{
    public function builder(Api $api): Response
    {
        return inertia('Builder', [
            'units' => $api->get('units')->json(),
        ]);
    }

    public function labs(): Response
    {
        return inertia('Labs');
    }

    public function palette(): Response
    {
        return inertia('Palette');
    }
}
