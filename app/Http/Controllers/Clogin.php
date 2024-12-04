<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Import the User model
use Illuminate\Support\Facades\Auth; // Import the Auth facade

class Clogin extends Controller
{
    /**
     * Display the login form.
     */
    public function index()
    {
        return view('auth.login'); // Ensure you have this Blade file
    }

    /**
     * Handle the login process.
     */
    public function login_proses(Request $request)
    {
        // Validate the request input
        $request->validate([
            'nisn' => 'required',      // Ensure NISN is provided
            'password' => 'required', // Ensure password is provided
        ], [
            'nisn.required' => 'NISN wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        // Attempt to authenticate using NISN and password
        $credentials = $request->only('nisn', 'password');

        if (Auth::attempt($credentials)) {
            // If authentication is successful, redirect to the dashboard
            return redirect()->route('dashboard');
        }

        // If authentication fails, redirect back with an error
        return redirect()->route('login')->withErrors([
            'nisn' => 'NISN atau password salah',
        ]);
    }
}
