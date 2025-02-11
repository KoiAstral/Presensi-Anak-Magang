<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Clogin; // Import the Clogin controller
use App\Http\Controllers\Cregister;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Redirect;

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

// Default route
Route::get('/', function () {
    return Redirect ('/login');
});

// Guest routes
Route::middleware('guest')->group(function () {
    // Login Routes
    Route::get('/login', [AuthController::class, 'login_page'])->name('login');
    Route::post('/login', [AuthController::class, 'login_proses'])->name('login_proses');

    // Registration Routes
    Route::get('/register', [AuthController::class, 'register_page'])->name('register');
    Route::post('/register', [AuthController::class, 'register_proses'])->name('register_proses');
});

// Authenticated routes
Route::middleware('auth')->group(function () {
        // Dashboard - Redirect berdasarkan role
        Route::get('/dashboard', function () {
            $user = auth()->user();
            return view($user->role === 'admin' ? 'home.dashboard_admin' : 'home.dashboard_user');
        })->name('dashboard');
    
    // Logout
    Route::get('/logout', [AuthController::class, 'logout_page'])->name('logout');
});

// Admin routes
Route::prefix('admin')->group(function () {
    Route::get('/presensi', [PresensiController::class, 'indexAdmin'])->name('Table_presensi');
    Route::get('/absensi', [AbsensiController::class, 'indexAdmin'])->name('Table_absensi');
});

// absensi routes
Route::get('/pengajuan_absensi', [AbsensiController::class, 'formAbsensi'])->name('form.absensi');
Route::post('/storeabsensi', [AbsensiController::class, 'store'])->name('store.absensi');



Route::get('/dashboard_user', [DashboardController::class, 'index'])->name('home.dashboard_user')->middleware('auth');




// profile routes
Route::get('/profile', [ProfileController::class, 'profile'])->name('profile_detail');

