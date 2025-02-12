<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presensi;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PresensiController extends Controller
{
    public function indexAdmin()
    {
        $presensi = Presensi::all();
        return view('admin.presensi.data_magang', compact('presensi'));
    }

    public function store()
    {
        $presensi = new Presensi();
        $presensi->nomor_induk = Auth::user()->nomor_induk;
        $presensi->tanggal_presensi = Carbon::now()->toDateString();
        $presensi->waktu_presensi = Carbon::now()->toTimeString();
        $presensi->status = 'Hadir';
        $presensi->save();

        return response()->json([
            'message' => 'Anda berhasil presensi',
        ]);
    }
}
