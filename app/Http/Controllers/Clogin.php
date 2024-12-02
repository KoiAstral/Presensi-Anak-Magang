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
            'email' => 'required|email', // Ensure email is provided and valid
            'password' => 'required',   // Ensure password is provided
        ], [
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'password.required' => 'Password wajib diisi',
        ]);

        // Attempt to authenticate using email and password
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // If authentication is successful, redirect to the home page
            return redirect()->route('home');
        }

        // If authentication fails, redirect back with an error
        return redirect()->route('login')->withErrors([
            'email' => 'Email atau password salah',
        ]);
    }
}
