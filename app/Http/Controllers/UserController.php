<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.user.data_magang', compact('users')); // Sesuai dengan lokasi view
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        
    }

    public function edit(User $user)
    {
        return view('admin.user.edit_magang', compact('user')); // Path view diperbaiki
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'sekolah' => 'required|string|max:255',
            'nomor_induk' => 'required|string|max:50|unique:users,nomor_induk,' . $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
            'status' => 'required|in:siswa',
        ]);

        $user->update($request->all());

        return redirect()->route('admin.user.data_magang')->with('success', 'User berhasil diperbarui.');

    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.user.data_magang')->with('success', 'User berhasil dihapus.');

    }
}
