<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absensi;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AbsensiController extends Controller
{
    public function indexAdmin()
    {
        $absensi = Absensi::with('user')->get();
        
        $user = Auth::user();
        return view('admin.absensi.data_absensi', compact('absensi', 'user'));
    }

    public function formAbsensi()
    {
        return view('form.pengajuan_izin');
    }

    public function index(Request $request)
    {
        return Absensi::where('nomor_induk', $request->nomor_induk)->first();
    }

    public function store(Request $request)
{
    $user = Auth::user();
    
    $request->validate([
        'waktu_absensi' => 'required',
        'jenis_absensi' => 'required|in:izin,sakit',
        'keterangan' => 'required|string|max:255',
        'tanggal_mulai' => 'required|date',
        'tanggal_akhir' => 'required|date|after_or_equal:tanggal_mulai',
    ], [
        'jenis_absensi.required' => 'Jenis absensi wajib diisi',
        'jenis_absensi.in' => 'Jenis absensi harus berupa izin atau sakit',
        'keterangan.required' => 'Keterangan wajib diisi',
        'keterangan.max' => 'Keterangan maksimal 255 karakter',
        'tanggal_akhir.after_or_equal' => 'Tanggal akhir harus setelah atau sama dengan tanggal mulai',
    ]);

    Absensi::create([
        'user_id' => $user->id,
        'waktu_absensi' => $request->waktu_absensi,
        'jenis_absensi' => $request->jenis_absensi,
        'keterangan' => $request->keterangan,
        'tanggal_mulai' => $request->tanggal_mulai,
        'tanggal_akhir' => $request->tanggal_akhir,
        'status' => 'pending',
    ]);

    return redirect()->route('dashboard')->with('success', 'Pengajuan berhasil dikirim.');
}


    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:approved,rejected',
        ]);
        $absensi = Absensi::where('id', $id)->firstOrFail();
        $absensi->status = $request->status;
        $absensi->save();

        return redirect()->back()->with('success', 'Status pengajuan telah diperbarui.');
    }
}