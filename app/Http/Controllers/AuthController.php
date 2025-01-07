<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login_page()
    {
        return view('auth.login');
    }

    public function login_proses(Request $request)
    {
        // Validasi awal untuk nomor_induk
        $request->validate([
            'nomor_induk' => 'required',
            'password' => 'required',
        ], [
            'nomor_induk.required' => 'Nomor Induk harus diisi.',
            'password.required' => 'Password harus diisi.',
        ]);

        // Cek apakah nomor_induk ada di database
        $user = User::where('nomor_induk', $request->nomor_induk)->first();

        if (!$user) {
            // Jika nomor_induk tidak ditemukan, hanya tampilkan error untuk nomor_induk
            return redirect()->route('login')->withErrors([
                'nomor_induk' => 'Nomor Induk tidak ditemukan.',
            ]);
        }

        // Jika nomor_induk ditemukan, cek password
        if (!Auth::attempt($request->only('nomor_induk', 'password'))) {
            // Jika password salah, tampilkan error untuk password saja
            return redirect()->route('login')->withErrors([
                'password' => 'Password salah.',
            ]);
        }

        // Jika semua validasi berhasil, redirect ke dashboard
        return redirect()->route('dashboard');
}


    public function register_page()
    {
        return view('auth.register');
    }

    public function register_proses(Request $request)
    {
  // Validation rules
  $request->validate([
    'nama'         => 'required|string|max:255',
    'nomor_induk'  => 'required|string|unique:users,nomor_induk',  // Ensure unique nomor_induk
    'email'        => 'required|email|unique:users,email',          // Ensure unique email
    'password'     => 'required|string|min:6|confirmed',            // Ensure confirmation of password
], [
    'nama.required'         => 'Nama wajib diisi',
    'nomor_induk.required'  => 'Nomor induk wajib diisi',
    'nomor_induk.unique'    => 'Nomor induk sudah terdaftar',
    'email.required'        => 'Email wajib diisi',
    'email.email'           => 'Format email tidak valid',
    'email.unique'          => 'Email sudah terdaftar',
    'password.required'     => 'Password wajib diisi',
    'password.min'          => 'Password minimal 6 karakter',
    'password.confirmed'    => 'Konfirmasi password tidak cocok',
]);

// Create user and hash password before saving
User::create([
    'nama'        => $request->nama,
    'nomor_induk' => $request->nomor_induk,
    'email'       => $request->email,
    'status'      => $request->status,  // Make sure this is handled properly in the form
    'password'    => Hash::make($request->password),
]);

// Redirect to login page with success message
return redirect()->route('login')->with('success', 'Registrasi berhasil, silakan login');
    }

    public function logout_page(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Anda telah berhasil logout!');
    }
}
