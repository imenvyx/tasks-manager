<?php

use App\Http\Controllers\KeywordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/tasks', [TaskController::class, 'index']);
Route::post('/tasks', [TaskController::class, 'store']);
Route::patch('/tasks/{id}/toggle', [TaskController::class, 'toggle']);

// keywords
Route::get('keywords', [KeywordController::class, 'index']);
Route::post('keywords', [KeywordController::class, 'store']);