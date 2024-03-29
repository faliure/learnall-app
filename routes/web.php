<?php

use App\Http\Controllers\InternalPagesController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\SecondaryPagesController;
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

Route::controller(PagesController::class)->group(function () {
    Route::get('/{home?}', 'home')->whereIn('home', ['', 'home'])->name('home');
    Route::get('/learn', 'learn')->name('learn');
    Route::get('/practice', 'practice')->name('practice');
    Route::get('/compete', 'compete')->name('compete');
    Route::get('/explore', 'explore')->name('explore');
});

Route::controller(SecondaryPagesController::class)->group(function () {
    Route::get('/courses', 'courses');
    Route::get('/units/{unitPosition}', 'unit')->name('unit.show');
    Route::get('/units/{unitPosition}/lessons/{lessonPosition}', 'lesson')->name('lesson.show');
});

Route::controller(InternalPagesController::class)->group(function () {
    Route::get('/builder', 'builder')->name('builder');
    Route::get('/labs', 'labs')->name('labs');
    Route::get('/palette', 'palette')->name('palette');
});
