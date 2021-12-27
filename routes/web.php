<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboardName');

Route::get('/login', [LoginController::class, 'index'])->name('loginName');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/register', [RegisterController::class, 'index'])->name('registerName');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/posts', function () {
    return view('posts.index');
});
