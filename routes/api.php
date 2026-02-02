<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\ProgressController;
use Illuminate\Support\Facades\Route;

// ==========================
// RUTAS PÚBLICAS
// ==========================
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// ==========================
// RUTAS PROTEGIDAS (SANCTUM)
// ==========================
Route::middleware('auth:sanctum')->group(function () {

    // Auth
    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);

    // Exercises
    Route::get('/exercises', [ExerciseController::class, 'index']);
    Route::get('/exercises/{id}', [ExerciseController::class, 'show']);
    Route::post('/exercises/submit', [ExerciseController::class, 'submit']);
    Route::get('/lessons', [ExerciseController::class, 'lessons']);

    // Progress
    Route::get('/progress', [ProgressController::class, 'index']);
    Route::get('/progress/{exerciseId}', [ProgressController::class, 'show']);
    Route::get('/leaderboard', [ProgressController::class, 'leaderboard']);
});
