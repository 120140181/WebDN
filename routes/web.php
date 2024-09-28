<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUS;

// Profile routes
Route::get('/', [LandingController::class, 'index'])->name('landing.index');
Route::get('/index', [LandingController::class, 'index'])->name('landing.index');
Route::get('/service', [LandingController::class, 'service'])->name('landing.service');
Route::get('/about', [LandingController::class, 'about'])->name('landing.about');
Route::get('/gallery', [LandingController::class, 'gallery'])->name('landing.gallery');
Route::post('/send-proses', [LandingController::class, 'send'])->name('send-proses');

// Auth routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('auth.login');
Route::post('/login-proses', [AuthController::class, 'login_proses'])->name('login-proses')->middleware('throttle:10,1');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout-proses');

// Admin routes with auth middleware
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'no-cache'], 'as' => 'admin.'], function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/reminder', [AdminController::class, 'reminder'])->name('reminder');
    Route::get('/history', [AdminController::class, 'history'])->name('history');
    Route::post('/store', [AdminController::class, 'store'])->name('reminder-store');
    Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('reminder-edit');
    Route::put('/update/{id}', [AdminController::class, 'update'])->name('reminder-update');
    Route::put('/delete/{id}', [AdminController::class, 'destroy'])->name('reminder-delete');
    Route::put('/approve/{id}', [AdminController::class, 'approve'])->name('reminder-approve');
    Route::get('/get-all-history', [AdminController::class, 'getAllHistory'])->name('get-all-history');

    // Menangani error ketika route tidak didefinisikan di dalam grup admin
    Route::fallback(function () {
        return redirect()->route('auth.login');
    });
});

// Menangani error ketika route tidak didefinisikan di luar grup admin
Route::fallback(function () {
    abort(404);
});