<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use Illuminate\Support\Facades\Auth; 

class Clogin extends Controller
{
    
    public function login_page()
    {
        return view('auth.login'); 
    }

   
    public function login_proses(Request $request)
    {
       
        $request->validate([
            'nisn' => 'required',     
            'password' => 'required', 
        ], [
            'nisn.required' => 'NISN wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        $credentials = $request->only('nisn', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        }
        return redirect()->route('login')->withErrors([
            'nisn' => 'NISN atau password salah',
        ]);
    }
}
