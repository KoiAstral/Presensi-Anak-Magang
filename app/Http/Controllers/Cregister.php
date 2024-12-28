<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Import the User model
use Illuminate\Support\Facades\Hash; // For password hashing

class Cregister extends Controller
{
    /**
     * Display the registration form.
     */
    public function register_page()
    {
        return view('auth.register'); // Ensure this Blade file exists
    }

    /**
     * Handle the registration process.
     */
    public function register(Request $request)
    {
        // Validate the request
        $request->validate([
            'nama'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'role'     => 'required|in:admin,user',
            'status'   => 'required|in:siswa,mahasiswa',
            'password' => 'required|string|min:6|confirmed',
        ], [
            'nama.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email'    => 'Format email tidak valid',
            'email.unique'   => 'Email sudah terdaftar',
            'role.required'  => 'Role wajib dipilih',
            'status.required'   => 'status wajib jelas',
            'password.required' => 'Password wajib diisi',
            'password.confirmed' => 'Konfirmasi password tidak cocok',
        ]);

        // Create the user
        User::create([
            'nama'     => $request->name,
            'email'    => $request->email,
            'role'     => $request->role,
            'status'   => $request->status,
            'password' => Hash::make($request->password),
        ]);

        // Redirect to login page with a success message
        return redirect()->route('login')->with('success', 'Registrasi berhasil, silakan login');
    }
}
