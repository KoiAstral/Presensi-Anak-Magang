<?php

namespace App\Http\Controllers;

use App\Models\Presensi;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class PresensiController extends Controller
{
    public function indexAdmin()
    {
        $presensi = Presensi::with('user')->get();
        $user = Auth::user();

        return view('admin.presensi.data_presensi', compact('presensi', 'user'));
    }

    public function store()
    {
        $user = Auth::user(); // Fetch the logged-in user
        $today = Carbon::now()->toDateString();

        $existingPresensi = Presensi::where('user_id', $user->id)
        ->whereDate('tanggal_presensi', $today)
        ->first();

        if ($existingPresensi) {
            return response()->json([
                'status' => 'error',
                'message' => 'Anda sudah melakukan presensi hari ini.',
            ], 400);
        }

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
