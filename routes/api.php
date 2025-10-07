<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\EditProfile;
use App\Http\Controllers\api\SkillOfferdController;
use App\Http\Controllers\api\SkillWantedController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/refresh', [AuthController::class, 'refresh']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout']);
    });
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me', [AuthController::class, 'me']);

    Route::get('/offerd-skills', [SkillOfferdController::class, 'index']);
    Route::post('/offerd-skills', [SkillOfferdController::class, 'store']);
    Route::get('/wantted-skills', [SkillWantedController::class, 'index']);
    Route::post('/wantted-skills', [SkillWantedController::class, 'store']);

    Route::get('/profile', [EditProfile::class, 'getProfile']);
    Route::put('/profile', [EditProfile::class, 'updateProfile']);
});
