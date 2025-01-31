<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presensi;
use App\Http\Controllers\UserController;

class PresensiController extends Controller
{
    public function indexAdmin()
    {
        $presensi = Presensi::all();

        return view('admin.presensi.data_magang', compact('presensi'));
    }
}
