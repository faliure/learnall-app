<?php

namespace App\Extensions\Auth;

use App\Services\Api;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider as AuthUserProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserProvider implements AuthUserProvider
{
    public function __construct(
        protected Request $request,
        protected Api $api
    ) {
    }

    /**
     * Retrieve a user by their unique identifier.
     */
    public function retrieveById($id)
    {
        if ($user = session("proxy.user.$id")) {
            // TODO : hit GET /auth to ensure the token is still valid and get latest data
            return User::from($user);
        }

        $data = $this->api->asGuest()->get("/users/$id")->json();

        return User::from($data);
    }

    /**
     * Retrieve a user by their unique identifier and "remember me" token.
     */
    public function retrieveByToken($id, $token)
    {
        return $this->retrieveById($id);
    }

    /**
     * Update the "remember me" token for the given user in storage.
     */
    public function updateRememberToken(Authenticatable $user, $token)
    {
        $user->setRememberToken($token);
    }

    /**
     * Retrieve a user by the given credentials.
     */
    public function retrieveByCredentials(array $credentials)
    {
        $data = $this->api->asGuest()->post('/auth', $credentials + [
            'device' => request()->header('User-Agent'),
        ]);

        $userData = $data->json('user')
                  + ['token'     => $data->json('token')]
                  + ['password'  => Hash::make($credentials['password'])];

        return User::from($userData);
    }

    /**
     * Validate a user against the given credentials.
     */
    public function validateCredentials(Authenticatable $user, array $credentials)
    {
        return ($user->email === $credentials['email'])
            && Hash::check($credentials['password'], $user->getAuthPassword());
    }

    public function refreshUserData(): void
    {
        if ($data = $this->api->get('/auth')->json('user')) {
            $this->storeUserData($data);
        }
    }

    public function storeUserData(array $data = []): void
    {
        foreach ($data as $attribute => $value) {
            me()->$attribute = $value;
        }

        session(['proxy.user.' . my('id') => me()->toArray()]);
    }

    public function forgetUserData()
    {
        session()->forget('proxy.user.' . my('id'));
    }
}
