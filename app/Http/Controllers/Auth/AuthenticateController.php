<?php

namespace App\Http\Controllers\Auth;

use App\Extensions\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Services\Api;
use App\Services\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Route;
use Inertia\Response;

class AuthenticateController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): Response
    {
        return inertia('Auth/Login', [
            'canResetPassword' => Route::has('password.request'),
            'status'           => session('status'),
        ]);
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request, Auth $auth, Api $api): RedirectResponse
    {
        $credentials = $request->merge([
            'device' => $request->header('User-Agent'),
        ])->all();

        $response = $api->post('auth', $credentials);

        $user = User::make($response->json('user'));

        $auth->store($user, $response->json('token'));

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Auth $auth, Api $api): RedirectResponse
    {
        $api->delete('auth');

        $auth->destroy();

        return redirect('/');
    }
}
