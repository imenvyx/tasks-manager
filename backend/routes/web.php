<?php

use App\Http\Controllers\KeywordController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('tasks', [TaskController::class, 'index']);
Route::post('tasks', [TaskController::class, 'store']);
Route::patch('tasks/{id}/toggle', [TaskController::class, 'toggle']);

// keywords
Route::get('keywords', [KeywordController::class, 'index']);
Route::post('keywords', [KeywordController::class, 'store']);
