<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Clogin; // Import the Clogin controller
use App\Http\Controllers\Cregister;
use App\Http\Controllers\UserController;


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

 
Route::middleware('guest')->group(function(){
    // Login routes
Route::get('/login', [AuthController::class, 'login_page'])->name('login'); 
Route::post('/login', [AuthController::class, 'login_proses'])->name('login_proses'); 

// Registration routes
Route::get('/register', [AuthController::class, 'register_page'])->name('register'); 
Route::post('/register', [AuthController::class, 'register_proses'])->name('register_proses');
});

Route::middleware('auth')->group(function(){
    Route::get('/dashboard', function () {

    $user = auth()->user();

    if($user->role == 'admin') {
        return view('home.dashboard_admin');
    } else {
        return view('home.dashboard_user');
    }

})->name('dashboard');

Route::get('/logout', [AuthController::class, 'logout_page'])->name('logout');
});




