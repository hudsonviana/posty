<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboardName');
Route::get('/register', [RegisterController::class, 'index'])->name('registerName');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/posts', function () {
    return view('posts.index');
});
