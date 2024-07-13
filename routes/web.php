<?php

use App\Http\Controllers\FileModelController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect::route('login');
});

Route::get('/files/subcategory/{subcategory}', [FileModelController::class, 'showBySubcategory'])->name('files.subcategory');


Route::middleware('auth')->group(function () {
    Route::resource('files', FileModelController::class);


});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
