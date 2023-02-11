<?php

namespace App\Http\Controllers;

use App\Extensions\Controller;
use App\Extensions\User;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegistrationRequest;
use App\Providers\RouteServiceProvider;
use App\Services\Api;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    /**
     * Handle an incoming registration request.
     */
    public function register(RegistrationRequest $request, Api $api): RedirectResponse
    {
        $api->post('users', $request->all());

        return $this->login($request);
    }

    /**
     * Handle an incoming authentication request.
     */
    public function login(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->merge([
            'device' => $request->header('User-Agent'),
        ])->all();

        auth()->attempt($credentials);

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function logout(Api $api): RedirectResponse
    {
        $api->delete('auth');

        auth()->logout();

        User::restore()?->destroy();

        return redirect()->back();
    }
}
