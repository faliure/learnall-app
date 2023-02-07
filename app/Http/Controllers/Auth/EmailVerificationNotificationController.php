<?php

namespace App\Http\Controllers\Auth;

use App\Extensions\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request): RedirectResponse
    {
        if (currentUser()->hasVerifiedEmail()) {
            return redirect()->intended(RouteServiceProvider::HOME);
        }

        currentUser()->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    }
}
