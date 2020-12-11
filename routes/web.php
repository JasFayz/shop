<?php


use App\Http\Controllers\Dashboard\HomeController;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('landing');

Route::post('/upload/file', [\App\Http\Controllers\UploadFileController::class, 'upload'])->name('upload-file');


Route::middleware('auth')
    ->namespace('\App\Http\Controllers\Dashboard')
    ->prefix('dashboard')
    ->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('dashboard.home');
        Route::get('/categories/import', [\App\Http\Controllers\Dashboard\ShopCategoryController::class, 'import']);
        Route::get('/products/import', [\App\Http\Controllers\Dashboard\ShopProductController::class, 'import']);

        Route::prefix('shop')->name('shop.')->group(function () {
            Route::resource('categories', ShopCategoryController::class);
            Route::resource('products', ShopProductController::class);
        });
    });


Route::get('category/{id}', [\App\Http\Controllers\Shop\CategoryController::class, 'show'])->name('category');
