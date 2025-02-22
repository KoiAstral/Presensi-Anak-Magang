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

    public function update(Request $request)
    {
        $user = Auth::user(); // Get the logged-in user

        // Validate the incoming data
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'nomor_induk' => 'required|string|max:20|unique:users,nomor_induk,' . $user->id,
            'sekolah' => 'required|string|max:255',
        ]);

        // Update user profile details using the update method
        $user->update([
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'nomor_induk' => $request->input('nomor_induk'),
            'sekolah' => $request->input('sekolah'),
        ]);        

        return redirect()->route('dashboard')->with('success', 'Profile updated successfully!');
    }
}
