<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Csiswa;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('siswa', Csiswa::class);
