<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('users.index', compact('users'));
    }

    // public function create()
    // {
    //     return view('user.create');
    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'nama'  => 'required',
    //         'nisn'  => 'required|unique:users,nisn',
    //         'email' => 'required|email|unique:users,email',
    //         'role'  => 'required'
    //     ]);

    //     User::create($request->all());

    //     return redirect()->route('user.index')->with('success', 'User created successfully.');
    // }

    // public function edit(String $id)
    // {
    //     $user = User::findorfail($id);
    //     return view('user.edit', compact('siswa'));
    // }

    public function edit(String $id)
    {
        $users = User::findorfail($id);
        return view('users.edit', compact('users'));
    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama'  => 'required',
            'nomor_induk'  => 'required|unique:users,nomor_induk',
            'email' => 'required|email|unique:users,email',
            'status'  => 'required'
        ]);

        $user = User::findorfail($id);

        $user->update([
            'nama' => $request->nama,
            'nomor_induk' => $request->nomor_induk,
            'email' => $request->email,
            'status' => $request->status,
        ]);

        return redirect()->route('users.index')->with('succes', 'User has been updated!');
    }

    public function delete($id)
    {
        $user = User::findorfail($id);
        $user->delete();
        return redirect()->route('users.index')->with('succes', 'User has been deleted!');
    }
}
