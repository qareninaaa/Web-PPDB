<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function index()
    {
        $pendaftaran = Pendaftaran::all();
        return view('pages.pendaftaran.index', compact('pendaftaran'));
    }

    public function create()
    {
        return view('pages.pendaftaran.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'calon_siswa_id' => 'required',
            'jalur_id' => 'required',
            'tahun_ajaran_id' => 'required',
            'asal_sekolah' => 'required',
            'nilai_rapor' => 'required',
            'file_ijazah' => 'required|file|mimes:pdf|max:2048',
            'file_kk' => 'required|file|mimes:pdf|max:2048',
            'file_akta' => 'required|file|mimes:pdf|max:2048',
            'status' => 'required',
        ]);

        Pendaftaran::create([
            'calon_siswa_id' => $request->calon_siswa_id,
            'jalur_id' => $request->jalur_id,
            'tahun_ajaran_id' => $request->tahun_ajaran_id,
            'asal_sekolah' => $request->asal_sekolah,
            'nilai_rapor' => $request->nilai_rapor,
            'file_ijazah' => $request->file('file_ijazah')->store('pendaftaran'),
            'file_kk' => $request->file('file_kk')->store('pendaftaran'),
            'file_akta' => $request->file('file_akta')->store('pendaftaran'),
            'status' => $request->status,
        ]);

        return redirect()->route('pendaftaran.index')->with('success', 'Pendaftaran berhasil.');
    }

    public function edit(string $id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        return view('pages.pendaftaran.edit', compact('pendaftaran'));
    }

    public function update(Request $request, string $id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);

        $request->validate([
            'calon_siswa_id' => 'required',
            'jalur_id' => 'required',
            'tahun_ajaran_id' => 'required',
            'asal_sekolah' => 'required',
            'nilai_rapor' => 'required',
            'file_ijazah' => 'nullable|file|mimes:pdf|max:2048',
            'file_kk' => 'nullable|file|mimes:pdf|max:2048',
            'file_akta' => 'nullable|file|mimes:pdf|max:2048',
            'status' => 'required', 
        ]);

        $pendaftaran->calon_siswa_id = $request->calon_siswa_id;
        $pendaftaran->jalur_id = $request->jalur_id;
        $pendaftaran->tahun_ajaran_id = $request->tahun_ajaran_id;
        $pendaftaran->asal_sekolah = $request->asal_sekolah;
        $pendaftaran->nilai_rapor = $request->nilai_rapor;
        $pendaftaran->status = $request->status;
        $pendaftaran->save();

        return redirect()->route('pendaftaran.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        $pendaftaran->delete();

        return redirect()->route('pendaftaran.index')->with('success', 'Data berhasil dihapus.');
    }
}