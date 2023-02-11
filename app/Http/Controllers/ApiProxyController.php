<?php

namespace App\Http\Controllers;

use App\Extensions\Auth\UserProvider;
use App\Extensions\Controller;
use App\Services\Api;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ApiProxyController extends Controller
{
    public const PROXIED = [

    ];

    public function __invoke(Request $request, Api $api, UserProvider $provider)
    {
        if (! $this->isWhitelisted($request)) {
            return response()->json('Invalid request', Response::HTTP_NOT_FOUND);
        }

        [ $method, $endpoint, $parameters, $resource ] = $this->params($request);

        $data = $api->$method($endpoint, $parameters);

        ($resource === 'users') && $provider->refreshUserData();

        return redirect()->back()->with($data->json());
    }

    private function params(Request $request): array
    {
        return [
            $request->getMethod(),
            $request->endpoint,
            $request->all(),
            preg_replace('#^/?([^/]+)/?.*$#', '$1', $request->endpoint),
        ];
    }

    private function isWhitelisted(Request $request): bool
    {
        return true;
    }
}
