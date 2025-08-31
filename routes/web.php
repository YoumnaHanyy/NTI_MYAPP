<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;

Route::get('/', function() {
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');


Route::get('/dashboard', [ArticleController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

// Article creation
Route::get('/articles/create', [ArticleController::class, 'create'])
    ->middleware('auth')
    ->name('articles.create');

Route::post('/articles', [ArticleController::class, 'store'])
    ->middleware('auth')
    ->name('articles.store');

