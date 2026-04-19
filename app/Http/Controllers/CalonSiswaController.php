<?php

namespace App\Http\Controllers;

use App\Models\CalonSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CalonSiswaController extends Controller
{
    public function index()
    {
        $siswa = CalonSiswa::all();
        return view('pages.calon_siswa.index', compact('siswa'));
    }

    public function create()
    {
        return view('pages.calon_siswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nisn' => 'required|unique:calon_siswa,nisn',
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
        ]);

        CalonSiswa::create([
            'user_id' => Auth::id(),
            'nisn' => $request->nisn,
            'nama_lengkap' => $request->nama_lengkap,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'status' => 'pending',
        ]);

        return redirect()->route('siswa.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function show($id)
    {
        $siswa = CalonSiswa::findOrFail($id);
        return view('pages.calon_siswa.show', compact('siswa'));
    }

    public function edit($id)
    {
        $siswa = CalonSiswa::findOrFail($id);
        return view('pages.calon_siswa.edit', compact('siswa'));
    }

    public function update(Request $request, $id)
    {
        $siswa = CalonSiswa::findOrFail($id);

        $request->validate([
            'nisn' => 'required|unique:calon_siswa,nisn,' . $id,
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'status' => 'required|in:pending,diterima,ditolak',
        ]);

        $siswa->update([
            'nisn' => $request->nisn,
            'nama_lengkap' => $request->nama_lengkap,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'status' => $request->status,
        ]);

        return redirect()->route('siswa.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $siswa = CalonSiswa::findOrFail($id);
        $siswa->delete();

        return redirect()->route('siswa.index')->with('success', 'Data berhasil dihapus.');
    }

    // ===== STATUS =====

    public function diterima()
    {
        $siswa = CalonSiswa::where('status', 'diterima')->get();
        return view('pages.calon_siswa.index', compact('siswa'));
    }

    public function ditolak()
    {
        $siswa = CalonSiswa::where('status', 'ditolak')->get();
        return view('pages.calon_siswa.index', compact('siswa'));
    }

    public function terima($id)
    {
        $siswa = CalonSiswa::findOrFail($id);
        $siswa->update(['status' => 'diterima']);

        return redirect()->route('siswa.index')->with('success', 'Calon siswa diterima.');
    }

    public function tolak($id)
    {
        $siswa = CalonSiswa::findOrFail($id);
        $siswa->update(['status' => 'ditolak']);

        return redirect()->route('siswa.index')->with('success', 'Calon siswa ditolak.');
    }
}