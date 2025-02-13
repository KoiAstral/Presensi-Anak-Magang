<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profile()
    {
        $user = Auth::user(); // Mengambil data pengguna yang sedang login
        return view('profile.profile_detail', compact('user')); // Mengirim data ke tampilan
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'nisn' => 'nullable|string|max:20',
            'asal_sekolah' => 'nullable|string|max:255',
            'password_lama' => 'nullable|required_with:password_baru',
            'password_baru' => 'nullable|min:6',
        ]);

        if($request->filled('password_baru')){
            if(!Hash::check($request->password_lama, $user->password)) {
                return back()->withErrors(['password_lama' => 'Password lama tidak sesuai.']);
            }
            $user->password = hash::make($request->password_baru);
        }
    }
}

