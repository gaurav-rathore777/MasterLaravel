<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('admin/services', App\Http\Controllers\Admin\ServiceController::class);
// Route::get('/service', [HomeController::class, 'index'])->name('frontend.first');


Route::get('/service', [HomeController::class, 'showFrontendServices']);


