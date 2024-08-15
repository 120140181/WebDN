<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;

Route::resource('/', LandingController::class);
Route::get('service', [LandingController::class, 'service'])->name('landing.service');
Route::get('about', [LandingController::class, 'about'])->name('landing.about');
Route::get('gallery', [LandingController::class, 'gallery'])->name('landing.gallery');
Route::get('login', [DashboardController::class, 'index'])->name('dashboard.login');