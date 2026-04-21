@extends('layouts.app')

@section('title', 'Data Calon Siswa')

@section('content')
<div class="pt-2 pb-4">
    <h3 class="fw-bold mb-3">Data Calon Siswa</h3>
    <div class="mb-3">
        <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Semua</a>
        <a href="{{ route('siswa.diterima') }}" class="btn btn-success">Diterima</a>
        <a href="{{ route('siswa.ditolak') }}" class="btn btn-danger">Ditolak</a>
    </div>
</div>

<div class="card card-body">
    <div class="table-responsive">
        <table class="table table-hover datatable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NISN</th>
                    <th>Nama Lengkap</th>
                    <th>Jenis Kelamin</th>
                    <th>No HP</th>
                    <th>Alamat</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($siswa as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nisn }}</td>
                        <td>{{ $item->nama_lengkap }}</td>
                        <td>{{ $item->jenis_kelamin }}</td>
                        <td>{{ $item->no_hp }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>
                            @if ($item->status == 'diterima')
                                <span class="badge bg-success">Diterima</span>
                            @elseif ($item->status == 'ditolak')
                                <span class="badge bg-danger">Ditolak</span>
                            @else
                                <span class="badge bg-secondary">Pending</span>
                            @endif
                        </td>

                    <td>
                        <a href="{{ route('siswa.show', $item->id) }}" class="btn text-primary btn-link py-0 px-2">
                            <span class="fas fa-eye"></span> Detail
                        </a>
                        <form action="{{ route('siswa.terima', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button class="btn text-success btn-link py-0 px-2">
                                <span class="fas fa-check"></span> Terima
                            </button>
                        </form>
                        <form action="{{ route('siswa.tolak', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button class="btn text-warning btn-link py-0 px-2">
                                <span class="fas fa-times"></span> Tolak
                            </button>
                        </form>
                        <a href="#" onclick="deleteAction('{{ route('siswa.destroy', $item->id) }}')" class="btn text-danger btn-link py-0 px-2">
                            <span class="fas fa-trash"></span> Hapus
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<form action="{{ route('siswa.destroy', 0) }}" method="post" id="delete-action" class="d-inline">
    @csrf
    @method('DELETE')
</form>
@endsection

@push('scripts')
<script src="{{ asset('/js/plugin/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

<script>
    $(function() {
        $('.datatable').DataTable();
    });

    function deleteAction(url) {
        swal({
            title: "Apakah Anda yakin?",
            text: "Data yang sudah dihapus tidak dapat dikembalikan!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((confirm) => {
            if (confirm) {
                $('#delete-action').attr('action', url);
                $('#delete-action').submit();
            }
        });
    }
</script>

@if(session('success'))
<script>
    swal({
        title: "Berhasil",
        text: "{{ session('success') }}",
        icon: "success",
        button: "OK",
    });
</script>
@endif
@endpush