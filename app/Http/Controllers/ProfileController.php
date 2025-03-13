<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    public function profile()
    {
        $user = Auth::user(); // Mengambil data pengguna yang sedang login
        return view('profile.profile_detail', compact('user')); // Mengirim data ke tampilan
    }
}
