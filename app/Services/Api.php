<?php

namespace App\Services;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class Api
{
    protected PendingRequest $request;

    public function __construct()
    {
        $this->request = Http::baseUrl(config('api.base_uri'))
            ->retry(3, 100, throw: true)
            ->connectTimeout(3)
            ->timeout(5)
            ->acceptJson()
            ->withoutVerifying()
            ->when(
                session('token'),
                fn ($http, $token) => $http->withToken($token)
            );
    }

    public function __call($name, $arguments)
    {
        return $this->request->$name(...$arguments);
    }
}
