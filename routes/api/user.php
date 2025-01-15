<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProfileController;


Route::prefix('user')->group(function () {
    Route::post('/login', [authController::class, 'login']);
    Route::post('/signup', [authController::class, 'signup']);
    Route::get('/profile', [ProfileController::class, 'profile'])->middleware('auth:api');
});
