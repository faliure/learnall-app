<?php

use App\Http\Controllers\Auth\TokenController;
use App\Http\Controllers\CrudActions\ExerciseController;
use App\Http\Controllers\CrudActions\LanguageController;
use App\Http\Controllers\CrudActions\LessonController;
use App\Http\Controllers\CrudActions\SentenceController;
use App\Http\Controllers\CrudActions\UnitController;
use App\Http\Controllers\CrudActions\UserController;
use App\Http\Controllers\CrudActions\WordController;
use App\Http\Resources\UserResource;
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
    Route::get('/me', fn () => new UserResource(me()));

});

/**
 * CRUD Actions
 */
Route::apiResources([
    '/exercises' => ExerciseController::class,
    '/languages' => LanguageController::class,
    '/lessons'   => LessonController::class,
    '/sentences' => SentenceController::class,
    '/units'     => UnitController::class,
    '/users'     => UserController::class,
    '/words'     => WordController::class,
]);
