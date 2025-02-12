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
    $absensi = Absensi::where('nomor_induk', $user->nomor_induk)->get();
    
    $presensi = Presensi::where('nomor_induk', $user->nomor_induk)->get();

    if ($user->status == 'admin') {
        return view('home.dashboard_admin', compact('user'));
    } else {
        return view('home.dashboard_user', compact('user', 'absensi', 'presensi'));
    }
}

}