<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;

Route::resource('/', LandingController::class);
Route::get('service', [LandingController::class, 'service'])->name('landing.service');
Route::get('about', [LandingController::class, 'about'])->name('landing.about');
Route::get('gallery', [LandingController::class, 'gallery'])->name('landing.gallery');
// auth routes
Route::get('login', [AuthController::class, 'showLoginForm'])->name('auth.login');
Route::post('login-proses', [AuthController::class, 'login_proses'])->name('login-proses');
Route::post('logout', [AuthController::class, 'logout'])->name('logout-proses');
// admin
Route::get('haloadmin', [AdminController::class, 'index'])->name('admin.index');
Route::get('reminder', [AdminController::class, 'reminder'])->name('admin.reminder');
Route::get('history', [AdminController::class, 'history'])->name('admin.history');
Route::get('index', [LandingController::class,'index'])->name('landing.index');
Route::post('send-proses', [LandingController::class,'send'])->name('send-proses');
