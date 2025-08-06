<?php

use App\Http\Controllers\Admin\AddonBenefitController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('admin/services', App\Http\Controllers\Admin\ServiceController::class);
Route::resource('admin/addon', AddonBenefitController::class);
Route::resource('admin/contacts', \App\Http\Controllers\ContactController::class);
// Route::get('/service', [HomeController::class, 'index'])->name('frontend.first');
// Route::prefix('admin')->middleware(['auth'])->group(function () {
   
// });



Route::get('/service', [HomeController::class, 'showFrontendServices']);

Route::get('/addons', [HomeController::class, 'showFrontendServices']);



