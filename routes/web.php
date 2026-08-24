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

    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');

    Route::post('users/clear-all', [App\Http\Controllers\UserController::class, 'bulkDelete'])->name('users.bulk_delete');

    Route::get('/users/add', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');

    Route::post('/users/add', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');

});