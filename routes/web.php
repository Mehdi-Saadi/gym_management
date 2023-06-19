<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/classes', [HomeController::class, 'classes'])->name('classes');
Route::get('/trainers', [HomeController::class, 'trainers'])->name('trainers');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/timetable', [HomeController::class, 'timetable'])->name('timetable');
Route::get('/bmi', [HomeController::class, 'bmi'])->name('bmi');
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');
Route::get('/blog', [HomeController::class, 'blog'])->name('blog');

Auth::routes();
