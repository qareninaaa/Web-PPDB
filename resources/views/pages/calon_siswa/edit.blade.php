@extends('layouts.app')

@section('content')
<div class="container py-3">
    <h3 class="fw-bold mb-3">Edit Calon Siswa</h3>

    <form action="{{ route('siswa.update', $siswa->id) }}" method="post">
        @csrf
        @method('PUT')

        <div class="card">
            <div class="card-body">

                {{-- NISN --}}
                <div class="form-group mb-3">
                    <label class="form-label">NISN</label>
                    <input type="text" name="nisn" 
                        value="{{ old('nisn') ?? $siswa->nisn }}" 
                        class="form-control">

                    @error('nisn')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Nama --}}
                <div class="form-group mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" 
                        value="{{ old('nama_lengkap') ?? $siswa->nama_lengkap }}" 
                        class="form-control">

                    @error('nama_lengkap')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Jenis Kelamin --}}
                <div class="form-group mb-3">
                    <label class="form-label">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control">
                        <option value="L" 
                            {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'L' ? 'selected' : '' }}>
                            Laki-laki
                        </option>
                        <option value="P" 
                            {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'P' ? 'selected' : '' }}>
                            Perempuan
                        </option>
                    </select>

                    @error('jenis_kelamin')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- No HP --}}
                <div class="form-group mb-3">
                    <label class="form-label">No HP</label>
                    <input type="text" name="no_hp" 
                        value="{{ old('no_hp') ?? $siswa->no_hp }}" 
                        class="form-control">

                    @error('no_hp')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Alamat --}}
                <div class="form-group mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control">{{ old('alamat') ?? $siswa->alamat }}</textarea>

                    @error('alamat')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Status --}}
                <div class="form-group mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-control">
                        <option value="pending" 
                            {{ old('status', $siswa->status) == 'pending' ? 'selected' : '' }}>
                            Pending
                        </option>
                        <option value="diterima" 
                            {{ old('status', $siswa->status) == 'diterima' ? 'selected' : '' }}>
                            Diterima
                        </option>
                        <option value="ditolak" 
                            {{ old('status', $siswa->status) == 'ditolak' ? 'selected' : '' }}>
                            Ditolak
                        </option>
                    </select>

                    @error('status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </div>
    </form>
</div>
@endsection