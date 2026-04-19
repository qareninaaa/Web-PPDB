@extends('layouts.app')

@section('content')
<div class="container py-3">
    <h3 class="fw-bold mb-3">Tambah Calon Siswa</h3>

    <form action="{{ route('siswa.store') }}" method="POST">
        @csrf

        <div class="card">
            <div class="card-body">

                {{-- NISN --}}
                <div class="form-group mb-3">
                    <label>NISN</label>
                    <input type="text" name="nisn" value="{{ old('nisn') }}" class="form-control">
                    @error('nisn')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Nama Lengkap --}}
                <div class="form-group mb-3">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}" class="form-control">
                    @error('nama_lengkap')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Jenis Kelamin --}}
                <div class="form-group mb-3">
                    <label>Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control">
                        <option value="">-- Pilih --</option>
                        <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- No HP --}}
                <div class="form-group mb-3">
                    <label>No HP</label>
                    <input type="text" name="no_hp" value="{{ old('no_hp') }}" class="form-control">
                    @error('no_hp')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Alamat --}}
                <div class="form-group mb-3">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control">{{ old('alamat') }}</textarea>
                    @error('alamat')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="diterima" {{ old('status') == 'diterima' ? 'selected' : '' }}>Diterima</option>
                        <option value="ditolak" {{ old('status') == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                    </select>
                </div>

            </div>

            <div class="card-footer">
                <button class="btn btn-primary">Simpan</button>
                <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </div>
    </form>
</div>
@endsection