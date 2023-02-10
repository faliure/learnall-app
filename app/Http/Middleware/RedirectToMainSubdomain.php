<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Routing\UrlGenerator;
use Symfony\Component\HttpFoundation\Response;

class RedirectToMainSubdomain
{
    /**
     * The current full url.
     */
    protected string $url;

    /**
     * Create a new middleware instance.
     */
    public function __construct(UrlGenerator $url)
    {
        $this->url = $url->current();
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle($request, Closure $next): Response
    {
        if ($mainSubdomain = config('app.subdomain')) {
            [ $subdomain, $domain, $path ] = $this->hostParts();

            if ($subdomain !== $mainSubdomain) {
                return redirect("//{$mainSubdomain}.{$domain}{$path}");
            }
        }

        return $next($request);
    }

    /**
     * Return relevant parts of the current url.
     *
     * @return array  Url parts: [subdomain, domain, path]
     */
    protected function hostParts(): array
    {
        [ 'host' => $host, 'path' => $path ] = parse_url($this->url);

        preg_match('#^(?:(.+)\.)?(.+?\..+)$#', $host, $matches);

        return [ $matches[1], $matches[2], $path ];
    }
}
