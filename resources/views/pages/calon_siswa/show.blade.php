@extends('layouts.app')

@section('content')
<div class="container py-3">
    <h3 class="fw-bold mb-3">Detail Calon Siswa</h3>

    <table class="table table-striped table-bordered">
        <tbody>
            <tr>
                <th>NISN</th>
                <td>{{ $siswa->nisn }}</td>
            </tr>
            <tr>
                <th>Nama Lengkap</th>
                <td>{{ $siswa->nama_lengkap }}</td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td>{{ $siswa->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
            </tr>
            <tr>
                <th>No HP</th>
                <td>{{ $siswa->no_hp }}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>{{ $siswa->alamat }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>
                    @if($siswa->status == 'pending')
                        <span class="badge bg-warning">Pending</span>
                    @elseif($siswa->status == 'diterima')
                        <span class="badge bg-success">Diterima</span>
                    @else
                        <span class="badge bg-danger">Ditolak</span>
                    @endif
                </td>
            </tr>
            <tr>
                <th>Dibuat pada</th>
                <td>{{ \Carbon\Carbon::parse($siswa->created_at)->isoFormat('DD MMM YYYY HH:mm:ss') }}</td>
            </tr>
            <tr>
                <th>Diperbarui pada</th>
                <td>{{ \Carbon\Carbon::parse($siswa->updated_at)->isoFormat('DD MMM YYYY HH:mm:ss') }}</td>
            </tr>
            <tr>
                <td colspan="2">
                    <a href="{{ route('siswa.index') }}" class="btn btn-primary">Kembali</a>

                    <form action="{{ route('siswa.destroy', $siswa->id) }}" 
                          method="POST" 
                          style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Yakin hapus data?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection