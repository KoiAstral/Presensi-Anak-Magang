<?php

namespace App\Http\Controllers;

use App\Models\Msiswa;
use Illuminate\Http\Request;

class Csiswa extends Controller
{
    public function index()
    {
        $siswa = Msiswa::get();
        return view('siswa.index', compact('siswa'));
    }

    public function create()
    {
        return view('siswa.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nis'           => 'required|string|max:10|unique:siswa,nis',
            'nama'          => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tanggal_lahir' => 'required|date',
        ]);

        Msiswa::create([
            'nis'           => $request->nis,
            'nama_siswa'    => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
        ]);

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil disimpan');
    }

    public function show(Msiswa $msiswa)
    {
        //
    }

    public function edit(string $nis)
    {
        $siswa = Msiswa::where('nis', $nis)->firstOrFail();
        return view('siswa.edit', compact('siswa'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nis'           => 'required|string|max:10|unique:siswa,nis,' . $id,
            'nama'          => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tanggal_lahir' => 'required|date',
        ]);

        $siswa = Msiswa::findOrFail($id);

        $siswa->update([
            'nis'           => $request->nis,
            'nama_siswa'    => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
        ]);

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diupdate');
    }

    public function destroy($id)
    {
        $siswa = Msiswa::findOrFail($id);
        $siswa->delete();
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diupdate');
    }
}

