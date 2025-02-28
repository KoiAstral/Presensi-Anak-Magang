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
Route::post('/absensi/store', [AbsensiController::class, 'store'])->name('store.absensi');

// Menyimpan data presensi
Route::post('/presensi', [PresensiController::class, 'store'])->name('presensi.store');

// profile routes
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
});

// admin route
Route::get('/data-siswa', [UserController::class, 'index'])->name('data.siswa');
Route::get('/riwayat-presensi', [PresensiController::class, 'indexAdmin'])->name('presensi.index');
Route::get('/konfirmasi-pengajuan', [AbsensiController::class, 'indexAdmin'])->name('konfirmasi-pengajuan');
Route::post('/absensi/updatestatus/{id}', [AbsensiController::class, 'updateStatus'])->name('absensi.updatestatus');


Route::prefix('admin/user')->middleware('auth')->group(function () {
    Route::get('/data-magang', [UserController::class, 'index'])->name('admin.user.data_magang'); // Menampilkan daftar magang
    Route::get('/edit/{user}', [UserController::class, 'edit'])->name('admin.user.edit_magang'); // Form edit
    Route::put('/update/{user}', [UserController::class, 'update'])->name('admin.user.update_magang'); // Update data
    Route::delete('/delete/{user}', [UserController::class, 'destroy'])->name('admin.user.delete_magang'); // Hapus data
});







