<?php

namespace App\Services;

use App\Models\User;

class Auth
{
    public function store(User $user, string $token): void
    {
        session()->put('user', $user);
        session()->put('token', $token);

        session()->regenerate();
    }

    public function destroy(): void
    {
        session()->invalidate();
        session()->regenerateToken();
    }
}
