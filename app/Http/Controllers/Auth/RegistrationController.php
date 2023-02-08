<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\RegistrationRequest;
use App\Services\Api;
use App\Services\Auth;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class RegistrationController extends AuthenticateController
{
    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function register(RegistrationRequest $request, Auth $auth, Api $api): RedirectResponse
    {
        $api->post('users', $request->all());

        return $this->store($request, $auth, $api);
    }
}
