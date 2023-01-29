<?php

use App\Extensions\Inertia\InertiaResource;
use App\Http\Controllers\Web\MeController;
use App\Models\Lesson;
use App\Models\Unit;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/{learn?}', fn () => inertia('Learn', [
    'units' => new InertiaResource(Unit::class),
]))->name('learn')->whereIn('learn', ['', 'learn']);

Route::get('/practice', fn () => inertia('Practice'))
    ->name('practice');

Route::get('/leaderboard', fn () => inertia('Leaderboard'))
    ->name('leaderboard');

Route::get('/explore', fn () => inertia('Explore'))
    ->name('explore');

Route::get('/stats', fn () => inertia('Stats'))
    ->name('stats');

Route::get('/units/{unit:slug}', fn (Unit $unit) => inertia('Unit', [
    'unit' => new InertiaResource($unit->load('lessons')),
]))->name('unit');

Route::get('/lessons/{lesson}', fn (Lesson $lesson) => inertia('Lesson', [
    'lesson' => new InertiaResource($lesson->load('exercises')),
]))->name('lesson');

Route::middleware('auth')->group(function () {
    Route::get('/me', [ MeController::class, 'edit' ])->name('me.edit');
    Route::patch('/me', [ MeController::class, 'update' ])->name('me.update');
    Route::delete('/me', [ MeController::class, 'destroy' ])->name('me.destroy');
});
