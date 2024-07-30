<?php

use App\Http\Controllers\FileModelController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;


// Route::get('/files/create', [FileModelController::class, 'create' ])->name('files.create')->middleware(IsAdmin::class);

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::get('/', function ()
 {

    return redirect('/files');

 });

 

 // Route for GET /files without middleware
Route::get('/files', [FileModelController::class, 'index'])->name('files.index');

// Apply middleware to all other resource routes
Route::middleware([IsAdmin::class])->group(function () {
    Route::resource('files', FileModelController::class)->except(['index']);
});


Route::get('/files/subcategory/{subcategory}', [FileModelController::class, 'showBySubcategory'])->name('files.subcategory');




Route::get('/dashboard', function () {
    return redirect('/admin');
});

require __DIR__.'/auth.php';
