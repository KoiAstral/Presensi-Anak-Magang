<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = User::get();
        return view('user.index', compact('user'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'  => 'required',
            'nisn'  => 'required|unique:users,nisn',
            'email' => 'required|email|unique:users,email',
            'role'  => 'required'
        ]);

        User::create($request->all());

        return redirect()->route('user.index')->with('success', 'User created successfully.');
    }

    public function edit(String $id)
    {
        $user = User::findorfail($id);
        return view('user.edit', compact('siswa'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama'  => 'required',
            'nisn'  => 'required|unique:users,nisn',
            'email' => 'required|email|unique:users,email',
            'role'  => 'required'
        ]);

        $user = User::findorfail($id);

        $user->update([
            'nama' => $request->nama,
            'nisn' => $request->nisn,
            'email' => $request->email,
            'role' => $request->role,
        ]);

        return redirect()->route('user.index')->with('succes', 'User has been updated!');
    }

    public function delete($id)
    {
        $user = User::findorfail($id);
        $user->delete();
        return redirect()->route('user.index')->with('succes', 'User has been deleted!');
    }

}
