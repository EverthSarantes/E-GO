<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Products\ProductsCategoryController;
use App\Http\Controllers\Products\ProductsController;


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

        Route::prefix('products')->group(function () {
            

            Route::prefix('categories')->group(function () {
                Route::get('index', [ProductsCategoryController::class, 'index'])->name('admin.products.categories.index');
                Route::get('show/{productCategory}', [ProductsCategoryController::class, 'show'])->name('admin.products.categories.show');
                Route::post('store', [ProductsCategoryController::class, 'store'])->name('admin.products.categories.store');
                Route::put('update/{productCategory}', [ProductsCategoryController::class, 'update'])->name('admin.products.categories.update');
                Route::delete('delete/{productCategory}', [ProductsCategoryController::class, 'delete'])->name('admin.products.categories.delete');
            });
        });
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

        Route::prefix('products')->group(function () {
            Route::get('/index', [ProductsController::class, 'index'])->name('entrepreneur.products.index');
            Route::post('/store', [ProductsController::class, 'store'])->name('entrepreneur.products.store');
            Route::get('/show/{product}', [ProductsController::class, 'show'])->name('entrepreneur.products.show');
            Route::delete('delete/{product}', [ProductsController::class, 'delete'])->name('entrepreneur.products.delete');

            Route::prefix('files')->group(function (){
                Route::post('store', [ProductsController::class, 'addFile'])->name('entrepreneur.products.files.store');
            });
        });
    });
});