<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UrlController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';
Route::get('/', function () {
    return view('welcome');
});

Route::get('/create-link', function () {
    return view('create-link');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', [UrlController::class, 'index'])->name('counter');
    Route::post('/createShortUrl', [UrlController::class, 'store'])->name('url.store');
    Route::get('{shortener_url}', [UrlController::class, 'shortUrl'])->name('shortener-url');
    Route::patch('/dashboard/{link}', [UrlController::class, 'update'])->name('url.update');
    Route::delete('/dashboard/{link}', [UrlController::class, 'destroy'])->name('url.destroy');
});


