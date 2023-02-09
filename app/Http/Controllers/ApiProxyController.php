<?php

namespace App\Http\Controllers;

use App\Extensions\Controller;
use App\Services\Api;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ApiProxyController extends Controller
{
    public const PROXIED = [

    ];

    public function __invoke(Request $request, Api $api)
    {
        if (! $this->isWhitelisted($request)) {
            return response()->json('Invalid request', Response::HTTP_NOT_FOUND);
        }

        $method = $request->getMethod();
        $endpoint = $request->endpoint;
        $parameters = $request->all();

        return $api->$method($endpoint, $parameters);
    }

    private function isWhitelisted(Request $request): bool
    {
        return true;
    }
}
