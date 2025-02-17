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
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');    
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


// Menampilkan data presensi untuk admin
Route::get('/admin/presensi', [PresensiController::class, 'indexAdmin'])->name('presensi.index');

// Menyimpan data presensi
Route::post('/presensi', [PresensiController::class, 'store'])->name('presensi.store');

// profile routes
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'profile']);
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});



