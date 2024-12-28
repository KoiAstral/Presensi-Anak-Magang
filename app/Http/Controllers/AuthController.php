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
        $request->validate([
            'nomor_induk'     => 'required',
            'password' => 'required',
        ], [
            'nomor_induk.required'     => 'nomor_induk wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        $credentials = $request->only('nomor_induk', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        }

        return redirect()->route('login')->withErrors([
            'nisn' => 'NISN atau password salah',
        ]);
    }

    public function register_page()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama'         => 'required|string|max:255',
            'nomor_induk'  => 'required|string',
            'email'        => 'required|email|unique:users,email',
            'password'     => 'required|string|min:6|confirmed',
        ], [
            'nama.required'         => 'Nama wajib diisi',
            'nomor_induk.required'  => 'Nomor induk wajib diisi',
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Format email tidak valid',
            'email.unique'          => 'Email sudah terdaftar',
            'password.required'     => 'Password wajib diisi',
            'password.confirmed'    => 'Konfirmasi password tidak cocok',
        ]);

        User::create([
            'nama'        => $request->nama,
            'nomor_induk' => $request->nomor_induk,
            'email'       => $request->email,
            'status'      => $request->status,
            'password'    => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil, silakan login');
    }

    public function logout_page(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Anda telah berhasil logout!');
    }
}
