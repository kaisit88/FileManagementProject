<?php

use App\Http\Controllers\FileModelController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

Route::get('/', function ()
 {

    return redirect('/files');

 });

Route::get('/files/create', [FileModelController::class, 'create' ])->middleware('admin');

Route::resource('files', FileModelController::class);



Route::get('/files/subcategory/{subcategory}', [FileModelController::class, 'showBySubcategory'])->name('files.subcategory');




Route::get('/dashboard', function () {
    return redirect('/admin');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
