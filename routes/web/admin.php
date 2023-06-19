<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('admin.index');
});
