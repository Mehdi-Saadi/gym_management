<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
// user routes
Route::prefix('users')->group(function () {
    Route::get('/', [AdminController::class, 'users'])->name('users');
    Route::delete('/{user}/delete', [AdminController::class, 'deleteUser'])->name('deleteUser');
    Route::get('/{user}/edit', [AdminController::class, 'editUser'])->name('editUser');
    Route::put('/{user}/update', [AdminController::class, 'updateUser'])->name('updateUser');
});

Route::get('/classes', [AdminController::class, 'classes'])->name('classes');
// category routes
Route::prefix('categories')->group(function () {
    Route::get('/', [CategoryController::class, 'categories'])->name('categories');
    Route::post('/add', [CategoryController::class, 'addCategory'])->name('addCategory');
    Route::delete('/{category}/delete', [CategoryController::class, 'deleteCategory'])->name('deleteCategory');
    Route::get('/{category}/edit', [CategoryController::class, 'editCategory'])->name('editCategory');
    Route::put('/{category}/update', [CategoryController::class, 'updateCategory'])->name('updateCategory');
});
