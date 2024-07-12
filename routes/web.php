<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\FileModelController;
Route::get('/files/download/{file}', [FileModelController::class, 'download'])->name('file.download');
Route::get('/files/image/{file}', [FileModelController::class, 'showimage'])->name('image.download');

Route::resource('files', FileModelController::class);

