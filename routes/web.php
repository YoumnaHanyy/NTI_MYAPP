<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return redirect()->route('login');
});

// =================== AUTH ===================
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// =================== ADMIN DASHBOARD ===================
Route::get('/admin/dashboard', [ArticleController::class, 'adminIndex'])
    ->middleware('auth')
    ->name('admin.dashboard');

// =================== USER DASHBOARD ===================
Route::get('/user/dashboard', [ArticleController::class, 'index'])
    ->middleware('auth')
    ->name('user.dashboard');

// =================== ARTICLES (BOTH ADMIN + USER) ===================
Route::get('/articles/create', [ArticleController::class, 'create'])
    ->middleware('auth')
    ->name('articles.create');

Route::post('/articles', [ArticleController::class, 'store'])
    ->middleware('auth')
    ->name('articles.store');


    Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])
    ->middleware('auth')
    ->name('articles.edit');

Route::put('/articles/{article}', [ArticleController::class, 'update'])
    ->middleware('auth')
    ->name('articles.update');

Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])
    ->middleware('auth')
    ->name('articles.destroy');


    // عرض مقال واحد
Route::get('/articles/{id}', [ArticleController::class, 'show'])
    ->middleware('auth')
    ->name('articles.show');




Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');