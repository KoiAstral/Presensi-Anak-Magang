<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Absensi;

class DashboardController extends Controller
{
    // Method to show the dashboard page
    public function index()
    {
        // Fetch the absensi data for the logged-in user
        $absensi = Absensi::where('nomor_induk', Auth::user()->nomor_induk)->get();

        // Return the user's dashboard view with absensi data
        return view('home.dashboard_user', compact('absensi'));
    }
}
