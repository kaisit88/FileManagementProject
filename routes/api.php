<?php

// routes/api.php

use App\Http\Controllers\FileModelController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/files', [FileModelController::class, 'index']);
Route::post('/files', [FileModelController::class, 'store']);
Route::get('/files/{id}', [FileModelController::class, 'show']);
Route::put('/files/{id}', [FileModelController::class, 'update']);
Route::delete('/files/{id}', [FileModelController::class, 'destroy']);
