<?php

namespace App\Services;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;

class Api
{
    protected bool $asGuest = false;

    public function asGuest(): self
    {
        $this->asGuest = true;

        return $this;
    }

    public function __call($name, $arguments)
    {
        try {
            return $this->getClient()->$name(...$arguments);
        } catch (RequestException $e) {
            // dd($e);
            // dd($e, me(), $this->asGuest, debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS));
            throw ValidationException::withMessages(
                $e->response->json('errors') ?? [
                    [ $e->getMessage() ]
                ] ?? [
                    "We're as surprised as you are. No idea what just happened..."
                ]
            );
        }
    }

    protected function getClient(): PendingRequest
    {
        return Http::baseUrl(config('api.base_uri'))
            ->retry(3, 100, throw: true)
            ->connectTimeout(3)
            ->timeout(5)
            ->acceptJson()
            ->withoutVerifying()
            ->when(
                $this->asGuest ? false : my('token'),
                fn ($http, $token) => $http->withToken($token)
            );
    }
}
