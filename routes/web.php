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
Route::get('/login', function () {
    return view('auth/login');
});
Route::get('/register', function () {
    return view('auth/register');
});
Route::get('/dashboard_user', function () {
    return view('user/dashboard_user');
});
Route::get('/pengajuan_izin', function () {
    return view('user/pengajuan_izin');
});
Route::get('/detail_profile', function () {
    return view('user/detail_profile');
});
Route::get('/dashboard_admin', function () {
    return view('admin/dashboard_admin');
});
Route::get('/data_magang', function () {
    return view('admin/data_magang');
});
Route::get('/edit_data', function () {
    return view('admin/edit_data');
});