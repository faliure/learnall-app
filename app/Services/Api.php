<?php

namespace App\Services;

use App\Extensions\User;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;

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
                User::restore()?->token,
                fn ($http, $token) => $http->withToken($token)
            );
    }

    public function __call($name, $arguments)
    {
        try {
            return $this->request->$name(...$arguments);
        } catch (RequestException $e) {
            dd($e->response);
            throw ValidationException::withMessages(
                $e->response->json('errors')
                    ?? "We're as surprised as you are. No idea what just happened..."
            );
        }
    }
}
