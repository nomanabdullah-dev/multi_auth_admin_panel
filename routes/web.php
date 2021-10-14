<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admins\AdminController;
use App\Http\Controllers\Admins\AdminDashboardController;
use App\Http\Controllers\Admins\RoleController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::prefix('admin')->middleware(['auth:sanctum','verified'])->name('admin.')->group(function() {
    Route::get('dashboard', [AdminDashboardController::class,'index'])->name('dashboard');

    Route::resource('roles', RoleController::class)->except(['edit']);
    Route::resource('admins', AdminController::class)->parameters(['admins' => 'user'])->only(['index', 'show', 'update']);
    Route::resource('users', UserController::class)->parameters(['users' => 'user'])->only(['index', 'show', 'update']);

    // Route::prefix('users')->name('users.')->group(function() {
    //     Route::get('/', [UserController::class, 'index'])->name('index');
    //     Route::get('/{user}', [UserController::class, 'show'])->name('show');
    //     Route::patch('/{user}', [UserController::class, 'update'])->name('update');
    // });
});
