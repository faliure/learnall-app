<?php

namespace App\Http\Controllers;

use App\Extensions\Auth\UserProvider;
use App\Extensions\Controller;
use App\Services\Api;
use Illuminate\Http\Client\Response as ClientResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ApiProxyController extends Controller
{
    public const PROXIED = [

    ];

    protected ?string $redirectTo = null;

    public function __construct(
        protected Api $api,
        protected Request $request,
        protected UserProvider $provider,
    ) {}

    public function __invoke()
    {
        if (! $this->isWhitelisted()) {
            return response()->json('Invalid request', Response::HTTP_NOT_FOUND);
        }

        $response = $this->extractRedirect()->execute();
        inertia()->share('response', $response->json());

        $redirect = $this->redirectTo ? redirect($this->redirectTo) : back();

        return $redirect->with('response', $response->json());
    }

    protected function isWhitelisted(): bool
    {
        return true;
    }

    protected function execute(): ClientResponse
    {
        [ $method, $endpoint, $parameters, $resource ] = $this->params();

        $response = $this->api->$method($endpoint, $parameters);

        ($resource === 'users') && $this->provider->refreshUserData();

        return $response;
    }

    protected function extractRedirect(): self
    {
        $this->redirectTo = $this->request->redirectTo;

        $this->request->offsetUnset('redirectTo');

        return $this;
    }

    protected function params(): array
    {
        return [
            $this->request->getMethod(),
            $this->request->endpoint,
            $this->request->all(),
            preg_replace('#^/?([^/]+)/?.*$#', '$1', $this->request->endpoint),
        ];
    }
}
