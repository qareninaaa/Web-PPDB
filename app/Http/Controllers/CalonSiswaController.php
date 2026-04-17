<?php

namespace App\Http\Controllers;

use App\Models\CalonSiswa;
use Illuminate\Http\Request;

class CalonSiswaController extends Controller
{
    public function index()
    {
        $calon_siswa = CalonSiswa::all();
        return view('pages.calon_siswa.index', compact('calon_siswa'));
    }

    public function create()
    {
        return view('pages.calon_siswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nisn' => 'required|unique:calon_siswa,nisn',
        ], [
            'nama.required' => 'Nama harus diisi.',
            'nisn.required' => 'NISN harus diisi.',
            'nisn.unique' => 'NISN sudah digunakan.',
        ]);

        CalonSiswa::create([
            'nama' => $request->nama,
            'nisn' => $request->nisn,
            'status' => 'pending', // default
        ]);

        return redirect()->route('siswa.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $calon_siswa = CalonSiswa::findOrFail($id);
        return view('pages.calon_siswa.show', compact('calon_siswa'));
    }

    public function edit(string $id)
    {
        $calon_siswa = CalonSiswa::findOrFail($id);
        return view('pages.calon_siswa.edit', compact('calon_siswa'));
    }

    public function update(Request $request, string $id)
    {
        $calon_siswa = CalonSiswa::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'nisn' => 'required|unique:calon_siswa,nisn,' . $id,
        ]);

        $calon_siswa->update([
            'nama' => $request->nama,
            'nisn' => $request->nisn,
        ]);

        return redirect()->route('siswa.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $calon_siswa = CalonSiswa::findOrFail($id);
        $calon_siswa->delete();

        return redirect()->route('siswa.index')->with('success', 'Data berhasil dihapus.');
    }

    // ================= STATUS =================

    public function diterima()
    {
        $calon_siswa = CalonSiswa::where('status', 'diterima')->get();
        return view('pages.calon_siswa.index', compact('calon_siswa'));
    }

    public function ditolak()
    {
        $calon_siswa = CalonSiswa::where('status', 'ditolak')->get();
        return view('pages.calon_siswa.index', compact('calon_siswa'));
    }

    public function terima($id)
    {
        $calon_siswa = CalonSiswa::findOrFail($id);
        $calon_siswa->status = 'diterima';
        $calon_siswa->save();

        return redirect()->route('siswa.index')->with('success', 'Calon siswa diterima.');
    }

    public function tolak($id)
    {
        $calon_siswa = CalonSiswa::findOrFail($id);
        $calon_siswa->status = 'ditolak';
        $calon_siswa->save();

        return redirect()->route('siswa.index')->with('success', 'Calon siswa ditolak.');
    }
}