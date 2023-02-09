<?php

namespace App\Providers;

use App\Extensions\UserProvider;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Auth::provider('proxy', fn () => app(UserProvider::class));

        Password::defaults(fn () => $this->app->environment('production')
            ? Password::min(8)->mixedCase()->numbers()->uncompromised()
            : Password::min(8));
    }
}
