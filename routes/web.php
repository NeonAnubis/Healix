<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Public\ClinicController;
use App\Http\Controllers\Public\DoctorController;
use App\Http\Controllers\Public\HomeController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');

// Doctor discovery
Route::get('/doctors', [DoctorController::class, 'index'])->name('doctors.index');
Route::get('/doctors/{slug}', [DoctorController::class, 'show'])->name('doctors.show');

// Clinic discovery
Route::get('/clinics', [ClinicController::class, 'index'])->name('clinics.index');
Route::get('/clinics/{slug}', [ClinicController::class, 'show'])->name('clinics.show');

// Auth routes (mockup - no actual authentication)
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');

// Healthcare Professional Dashboard (mockup - bypasses auth)
Route::prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');
    Route::get('/appointments', [DashboardController::class, 'appointments'])->name('appointments');
    Route::get('/patients', [DashboardController::class, 'patients'])->name('patients');
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
    Route::get('/reviews', [DashboardController::class, 'reviews'])->name('reviews');
});

// Admin Panel (mockup - bypasses auth)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('/doctors', [AdminController::class, 'doctors'])->name('doctors');
    Route::get('/clinics', [AdminController::class, 'clinics'])->name('clinics');
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::get('/reports', [AdminController::class, 'reports'])->name('reports');
    Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
});
