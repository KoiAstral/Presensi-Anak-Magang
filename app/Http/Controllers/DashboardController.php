<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Absensi;
use App\Models\Presensi;

class DashboardController extends Controller
{
    // Method to show the dashboard page
    public function index()
{
    $user = Auth::user(); // Ambil data user yang sedang login

    if ($user->status == 'admin') {
        // Data Summary untuk Admin
        $totalUsers = \App\Models\User::count();
        $totalHadir = Presensi::whereDate('tanggal_presensi', today())->where('status', 'hadir')->count();
        $totalAbsensi = Presensi::whereDate('tanggal_presensi', today())->count(); // Menghitung total absensi

        return view('home.dashboard_admin', compact('user', 'totalUsers', 'totalHadir', 'totalAbsensi'));
    } else {
        // Data untuk User Biasa
        $presensi = Presensi::where('user_id', $user->id)->get();
        $absensi = Absensi::where('user_id', $user->id)->get();

        return view('home.dashboard_user', compact('user', 'absensi', 'presensi'));
    }
}

}