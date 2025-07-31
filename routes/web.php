<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
})->name('/');

Route::post('/login', [App\Http\Controllers\LoginController::class, 'login'])->name('login');
Route::post('/logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->middleware('checkAdmin')->group(function () {
        Route::get('/panel', function () {
            return view('admin.panel');
        })->name('admin.dashboard');
    });

    Route::prefix('customer')->group(function () {
        Route::get('/panel', function () {
            return view('customer.panel');
        })->name('customer.panel');
    });

    Route::prefix('entrepreneur')->group(function () {
        Route::get('/panel', function () {
            return view('entrepreneur.panel');
        })->name('entrepreneur.panel');
    });
});