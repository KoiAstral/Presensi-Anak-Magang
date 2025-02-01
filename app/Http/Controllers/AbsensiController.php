<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absensi;
use Illuminate\Support\Facades\Auth;

class AbsensiController extends Controller
{
    public function indexAdmin()
    {
        $absensi = Absensi::all();

        return view('admin.absensi.data_magang', compact('absensi'));
    }

    public function formAbsensi()
    {
        return view('form.pengajuan_izin');

    }

    public function index(Request $request)
    {
        $absensi = Absensi::where('nomor_induk', $request->nomor_induk)->first();
    }

    public function store(Request $request)
{
     $request->validate([
         'nomor_induk' => 'required|string|max:20',
         'waktu_absensi' => 'required',
         'jenis_absensi' => 'required|in:izin,sakit',
         'keterangan' => 'required|string|max:255',
         'tanggal_mulai' => 'required|date',
         'tanggal_akhir' => 'required|date|after_or_equal:tanggal_mulai',
     ]);

    Absensi::create([
        'nomor_induk' => $request->nomor_induk,
         'waktu_absensi' => $request->waktu_absensi,
         'jenis_absensi' => $request->jenis_absensi,
         'keterangan' => $request->keterangan,
         'tanggal_mulai' => $request->tanggal_mulai,
         'tanggal_akhir' => $request->tanggal_akhir,
         'status' => 'pending', // Default status pending?
    ]);

  

    return redirect()->route('form.absensi')->with('success', 'Absence request submitted successfully.');
}




}
