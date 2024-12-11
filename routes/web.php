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
Route::get('/login', [Clogin::class, 'index'])->name('login'); 
Route::post('/login', [Clogin::class, 'login_proses'])->name('login.proses'); 

// Registration routes
Route::get('/register', [Cregister::class, 'index'])->name('register'); 
Route::post('/register', [Cregister::class, 'register'])->name('register.proses'); 


Route::get('/dashboard', function () {
    return view('dashboard'); 
})->name('dashboard')->middleware('auth');
