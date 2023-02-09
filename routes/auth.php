<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SecondaryPagesController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [SecondaryPagesController::class, 'register'])->name('register');
    Route::get('login', [SecondaryPagesController::class, 'login'])->name('login');

    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
});

Route::middleware('auth:web')->group(function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});
