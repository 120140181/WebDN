<?php

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\DashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::resource('/', LandingController::class);
Route::get('service', [LandingController::class, 'service'])->name('landing.service');
Route::get('about', [LandingController::class, 'about'])->name('landing.about');
Route::get('gallery', [LandingController::class, 'gallery'])->name('landing.gallery');
Route::get('login', [DashboardController::class, 'index'])->name('dashboard.login');
Route::post('login', [Dashboardcontroller::class, 'authenticate']);
Route::get('haloadmin', [AdminController::class, 'index'])->name('admin.index');
Route::get('reminder', [AdminController::class, 'reminder'])->name('admin.reminder');
Route::get('history', [AdminController::class, 'history'])->name('admin.history');
Route::get('index', [LandingController::class,'index'])->name('landing.index');
Route::post('send-proses', [LandingController::class,'send'])->name('send-proses');
