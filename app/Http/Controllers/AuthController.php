<?php

namespace App\Http\Controllers;

use App\Extensions\Auth\UserProvider;
use App\Extensions\Controller;
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
    public function register(RegistrationRequest $request, Api $api, UserProvider $users): RedirectResponse
    {
        $api->post('users', $request->all());

        return $this->login($request, $users);
    }

    /**
     * Handle an incoming authentication request.
     */
    public function login(LoginRequest $request, UserProvider $users): RedirectResponse
    {
        $credentials = $request->merge([
            'device' => $request->header('User-Agent'),
        ])->all();

        if (auth()->attempt($credentials)) {
            $users->storeUserData();
        }

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function logout(Api $api, UserProvider $users): RedirectResponse
    {
        $users->forgetUserData();

        $api->delete('auth');

        auth()->logout();

        return redirect()->back();
    }
}
