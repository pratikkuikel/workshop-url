<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlController;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    // returns dashboard view
    Route::view('/dashboard','dashboard')->name('dashboard');

    // routes for the url page
    Route::get('/urls',[Urlcontroller::class,'index'])->name('urls');

    // route for url submission
    Route::post('/urls',[Urlcontroller::class,'store'])->name('urls.create');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
