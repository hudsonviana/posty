<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('homeName');

Route::get('/dashboard', [DashboardController::class, 'index'])
->name('dashboardName');

Route::post('/logout', [LogoutController::class, 'store'])->name('logoutName');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/register', [RegisterController::class, 'index'])->name('registerName');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/posts', [PostController::class, 'index'])->name('postsName');
Route::post('/posts', [PostController::class, 'store']);

Route::post('/posts/{post}/likes', [PostLikeController::class, 'store'])->name('postsName.likes');
Route::delete('/posts/{post}/likes', [PostLikeController::class, 'destroy'])->name('postsName.likes');