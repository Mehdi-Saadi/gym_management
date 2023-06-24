<?php

use App\Http\Controllers\Trainer\CourseController;
use App\Http\Controllers\Trainer\TrainerController;
use Illuminate\Support\Facades\Route;

// profile routes
Route::prefix('profile')->group(function () {
    Route::get('/', [TrainerController::class, 'profile'])->name('profile');
    Route::get('/edit', [TrainerController::class, 'editProfile'])->name('editProfile');
    Route::put('/{user}/update', [TrainerController::class, 'updateProfile'])->name('updateProfile');
});

// class routes
Route::prefix('classes')->group(function () {
    Route::get('/', [CourseController::class, 'classes'])->name('classes');
    Route::get('/{course}/info', [CourseController::class, 'classes'])->name('infoClass');
});
