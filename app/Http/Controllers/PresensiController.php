<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presensi;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class PresensiController extends Controller
{
    public function indexAdmin()
    {
        $presensi = Presensi::with('user')->get(); 
        $presensi = Presensi::all();
        $user = Auth::user();
        $users = User::all();
        return view('admin.presensi.data_presensi', compact('presensi', 'user'));
    }

    
    public function store()
    {
        $user = Auth::user(); // Fetch the logged-in user

        $presensi = new Presensi();
        $presensi->user_id = $user->id; 
        $presensi->tanggal_presensi = Carbon::now()->toDateString();
        $presensi->waktu_presensi = Carbon::now()->toTimeString();
        $presensi->status = 'Hadir';
        $presensi->save();

        return response()->json([
            'message' => 'Anda berhasil presensi',
        ]);
    }
}
