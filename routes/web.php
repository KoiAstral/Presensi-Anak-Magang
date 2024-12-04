<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Clogin; // Import the Clogin controller
use App\Http\Controllers\Cregister;

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
    return view('welcome');
});

// Login routes
Route::get('/login', [Clogin::class, 'index'])->name('login'); // Show login form
Route::post('/login', [Clogin::class, 'login_proses'])->name('login.proses'); // Handle login submission

// Registration routes
Route::get('/register', [Cregister::class, 'index'])->name('register'); // Show the registration form
Route::post('/register', [Cregister::class, 'register'])->name('register.proses'); // Handle registration submission

// Dashboard route (after successful login)
Route::get('/dashboard', function () {
    return view('dashboard'); // Redirect to dashboard.blade.php
})->name('dashboard')->middleware('auth');
