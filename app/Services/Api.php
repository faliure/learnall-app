<?php

namespace App\Services;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use stdClass;

class Api
{
    protected Client $client;

    protected bool $respondWithBody = true;

    public function __construct(array $config = [])
    {
        $this->client = new Client($config + [
            'base_uri' => trim(config('api.base_uri'), '/') . '/',
            'timeout'  => 5,
            'verify'   => false,
        ]);
    }

    public function respondWithBody(): self
    {
        $this->respondWithBody = true;

        return $this;
    }

    public function respondWithHttpResponse(): self
    {
        $this->respondWithBody = false;

        return $this;
    }

    public function __call($name, $arguments)
    {
        $return = $this->client->$name(...$arguments);

        if ($return instanceof ResponseInterface) {
            return $this->processResponse($return);
        }

        return $return;
    }

    /**
     * Return the proper response depending on settings:
     *   - if @@respondWithBody is false, just forward Guzzle's original response
     *   - otherwise, return the response body:
     *     - if the content is JSON, decode it (returns array or stdClass)
     *     - if not JSON, return the body string as received
     */
    protected function processResponse(ResponseInterface $response): ResponseInterface|stdClass|array|string
    {
        if (! $this->respondWithBody()) {
            return $response;
        }

        $body = $response->getBody()->getContents();
        $json = in_array('application/json', $response->getHeader('Content-Type'));

        return $json ? json_decode($body) : $body;
    }
}
