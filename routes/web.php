<?php

use App\Http\Controllers\Dashboard\Auth\LoginController;
use App\Http\Controllers\Dashboard\Auth\LogoutController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\ProfileController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/dashboard/login');

Route::prefix('dashboard')->group(function () {
    // Guest Routes (Dashboard Guard)
    Route::middleware('guest:dashboard')->group(function () {
        Route::get('login', [LoginController::class, 'showLoginForm'])->name('dashboard.login');
        Route::post('login', [LoginController::class, 'login']);
    });

    // Authenticated Routes (Dashboard Guard)
    Route::middleware('auth:dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
        Route::post('logout', [LogoutController::class, 'logout'])->name('dashboard.logout');
        
        Route::get('profile', [ProfileController::class, 'edit'])->name('dashboard.profile.edit');
        Route::put('profile', [ProfileController::class, 'update'])->name('dashboard.profile.update');
        Route::put('profile/password', [ProfileController::class, 'updatePassword'])->name('dashboard.profile.password');
    });
});
