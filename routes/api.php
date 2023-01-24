<?php

use App\Http\Controllers\Auth\TokenController;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
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
    Route::get('/auth', fn () => new UserResource(Auth::user()));
});
