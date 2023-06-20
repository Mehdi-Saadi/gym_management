<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
Route::get('/users', [AdminController::class, 'users'])->name('users');
Route::get('/classes', [AdminController::class, 'classes'])->name('classes');
Route::prefix('categories')->group(function () {
    Route::get('/', [CategoryController::class, 'categories'])->name('categories');
    Route::post('/add', [CategoryController::class, 'addCategory'])->name('addCategory');
    Route::delete('/{id}/delete', [CategoryController::class, 'deleteCategory'])->name('deleteCategory');
    Route::get('/{id}/edit', [CategoryController::class, 'editCategory'])->name('editCategory');
});
