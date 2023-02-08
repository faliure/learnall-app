<?php

namespace App\Services;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class Api
{
    protected PendingRequest $request;

    public function __construct()
    {
        $this->request = Http::connectTimeout(3)
            ->retry(3, 100, throw: true)
            ->withOptions([
                'base_uri' => trim(config('api.base_uri'), '/') . '/',
                'timeout'  => 5,
                'verify'   => false,
                'headers'  => [ 'Accept' => 'application/json' ]
            ]);

            ($token = session('token')) && $this->request->withToken($token);
    }

    public function __call($name, $arguments)
    {
        return $this->request->$name(...$arguments);
    }
}
