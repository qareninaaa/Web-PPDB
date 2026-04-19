@extends('layouts.app')

@section('title', 'Data Calon Siswa')

@section('content')
<div class="pt-2 pb-4">
    <h3 class="fw-bold mb-3">Data Calon Siswa</h3>
</div>

<a href="{{ route('siswa.create') }}" class="btn btn-primary mb-3">
    <span class="fas fa-plus"></span> Tambah Calon Siswa
</a>

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
                            @if ($item->status == 'Diterima')
                                <span class="badge bg-success">Diterima</span>
                            @elseif ($item->status == 'Ditolak')
                                <span class="badge bg-danger">Ditolak</span>
                            @else
                                <span class="badge bg-secondary">Pending</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('siswa.edit', $item->id) }}" class="btn text-primary btn-link py-0 px-2 text-decoration-none mx-1">
                                <span class="fas fa-edit"></span> Edit
                            </a>

                            <a href="{{ route('siswa.show', $item->id) }}" class="btn text-primary btn-link py-0 px-2 text-decoration-none mx-1">
                                <span class="fas fa-eye"></span> Detail
                            </a>

                            <a href="#" onclick="deleteAction('{{ route('siswa.destroy', $item->id) }}')" class="btn text-danger btn-link py-0 px-2 text-decoration-none mx-1">
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