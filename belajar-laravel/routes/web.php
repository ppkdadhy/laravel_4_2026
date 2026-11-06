<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BelajarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;



// get, post, put, delete
Route::get('belajar', [BelajarController::class, 'index']);
Route::get('tambah', [BelajarController::class, 'tambah'])->name('tambah');
Route::post('actionTambah', [BelajarController::class, 'actionTambah'])->name('actionTambah');

Route::get('pengurangan', [BelajarController::class, 'kurang'])->name('pengurangan');
Route::get('bagi', [BelajarController::class, 'bagi'])->name('bagi');
Route::get('perkalian', [BelajarController::class, 'kali'])->name('perkalian');

// prefix
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [\App\Http\Controllers\LoginController::class, 'login']);
    Route::post('/actionLogin', [
        \App\Http\Controllers\LoginController::class,
        'actionLogin'
    ])->name('actionLogin');

    Route::resource('dashboard', \App\Http\Controllers\DashboardController::class);
    Route::resource('user', \App\Http\Controllers\UserController::class);
    Route::resource('category', \App\Http\Controllers\CategoryController::class);
    Route::resource('product', ProductController::class);

    Route::get('/settings', [\App\Http\Controllers\SettingController::class, 'index'])->name('settings');
    Route::post('/settings', [\App\Http\Controllers\SettingController::class, 'update'])->name('settings.update');
});

Route::get('/', [HomeController::class, 'index']);
Route::get('/category/{slug}', [\App\Http\Controllers\CatalogController::class, 'category'])->name('category.show');
Route::get('/product/{slug}', [\App\Http\Controllers\CatalogController::class, 'product'])
    ->name('product.show');
