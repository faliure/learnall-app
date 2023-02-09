<?php

namespace App\Extensions;

use App\Services\Api;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider as AuthUserProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserProvider implements AuthUserProvider
{
    protected ?User $user;

    public function __construct(protected Request $request, protected Api $api)
    {
        $this->user = User::restore();
    }

    /**
     * Retrieve a user by their unique identifier.
     */
    public function retrieveById($id)
    {
        if ($this->user?->id === $id) {
            return $this->user;
        }

        $data = $this->api->get("/users/$id")->json();

        return User::make($data);
    }

    /**
     * Retrieve a user by their unique identifier and "remember me" token.
     */
    public function retrieveByToken($id, $token)
    {
        if ($this->user?->id === $id && $this->user?->getRememberToken() === $token) {
            return $this->user;
        }

        $data = $this->api->get('/auth');
        $user = $data->json('user');
        $apiToken = $data->json('token');

        return User::make($user + [ 'token' => $apiToken ]);
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
        if ($this->user?->email === $credentials['email']) {
            return $this->user;
        }

        $data = $this->api->post('/auth', $credentials + [
            'device' => request()->header('User-Agent'),
        ]);

        $userData = $data->json('user')
                  + ['token' => $data->json('token')]
                  + ['password' => Hash::make($credentials['password'])];

        return User::make($userData);
    }

    /**
     * Validate a user against the given credentials.
     */
    public function validateCredentials(Authenticatable $user, array $credentials)
    {
        return ($user->email === $credentials['email'])
            && Hash::check($credentials['password'], $user->getAuthPassword());
    }
}
