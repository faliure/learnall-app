<?php

use App\Http\Controllers\Auth\TokenController;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('ping', fn () => "Pong!");

Route::post('/auth/sanctum', TokenController::class);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me', fn () => new UserResource(Auth::user()));
    Route::get('/users', fn () => UserResource::collection(User::all()));
    Route::get('/users/{user}', fn (User $user) => new UserResource($user));
});
