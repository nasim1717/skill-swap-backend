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

    Route::get('/offered-skills', [SkillOfferdController::class, 'index']);
    Route::get('/wantted-skills', [SkillWantedController::class, 'index']);

    Route::get('/edit-profile', [EditProfile::class, 'getProfile']);
    Route::post('/edit-profile', [EditProfile::class, 'updateProfile']);
});
