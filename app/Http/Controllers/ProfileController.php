<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ProfileController extends Controller
{
    public function profile()
    {
        $user = Auth::user(); // Mengambil data pengguna yang sedang login
        return view('profile.profile_detail', compact('user')); // Mengirim data ke tampilan
    }
}
