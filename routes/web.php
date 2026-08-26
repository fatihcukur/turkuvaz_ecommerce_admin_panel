<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {

    Route::get('/', function () {
        return redirect()->route('users.index');
    });
    //users
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');

    Route::post('users/clear-all', [App\Http\Controllers\UserController::class, 'bulkDelete'])->name('users.bulk_delete');

    Route::get('/users/add', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');

    Route::post('/users/add', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
    //categories
    Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'index'])->name('categories.index');

    Route::get('/categories/edit/{id}', [App\Http\Controllers\CategoryController::class, 'edit'])->name('categories.edit');

    Route::put('/categories/edit/{id}', [App\Http\Controllers\CategoryController::class, 'update'])->name('categories.update');

    Route::get('/categories/add', [App\Http\Controllers\CategoryController::class, 'create'])->name('categories.create');

    Route::post('/categories/add', [App\Http\Controllers\CategoryController::class, 'store'])->name('categories.store');

    Route::delete('/categories/delete/{id}', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('categories.destroy');
    //products
    Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products.index');
    Route::get('/products/add', [App\Http\Controllers\ProductController::class, 'create'])->name('products.create');
    Route::post('/products/add', [App\Http\Controllers\ProductController::class, 'store'])->name('products.store');
    Route::get('/products/edit/{id}', [App\Http\Controllers\ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/edit/{id}', [App\Http\Controllers\ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/delete/{id}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('products.destroy');

});

Route::get('/users/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');

Route::put('/users/edit/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');

Route::delete('users/delete/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');

