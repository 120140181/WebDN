<?php
// File: routes/web.php

use App\Http\Controllers\LandingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

// profile
Route::resource('/', LandingController::class);
Route::get('/index', [LandingController::class, 'index'])->name('landing.index');
Route::get('/service', [LandingController::class, 'service'])->name('landing.service');
Route::get('/about', [LandingController::class, 'about'])->name('landing.about');
Route::get('/gallery', [LandingController::class, 'gallery'])->name('landing.gallery');
Route::post('/send-proses', [LandingController::class, 'send'])->name('send-proses');

// auth routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('auth.login');
Route::post('/login-proses', [AuthController::class, 'login_proses'])->name('login-proses')->middleware('throttle:10,1');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout-proses');

// middleware
// admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'as' => 'admin.'], function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/reminder', [AdminController::class, 'reminder'])->name('reminder');
    Route::get('/history', [AdminController::class, 'history'])->name('history');
    // tambahReminder
    Route::post('/store', [AdminController::class, 'store'])->name('reminder-store');
    // editReminder
    Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('reminder-edit');
    // simpanEditReminder
    Route::put('/update/{id}', [AdminController::class, 'update'])->name('reminder-update');
    // hapusReminder
    Route::put('/delete/{id}', [AdminController::class, 'destroy'])->name('reminder-delete');
    // approveReminder
    Route::put('/approve/{id}', [AdminController::class, 'approve'])->name('reminder-approve');
    // notifikasi

    // cetak-pdf
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

Route::get('/run-schedule', function () {
    Artisan::call('schedule:run');
    return 'Schedule run executed';
});
