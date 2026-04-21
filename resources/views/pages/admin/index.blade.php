@extends('layouts.app')

@section('title', 'Data Admin')

@section('content')
 <div class="pt-2 pb-4">
    <h3 class="fw-bold mb-3">Data Admin</h3>
</div>

<a href="{{ route('admin.create') }}" class="btn btn-primary mb-3">
    <span class="fas fa-plus"></span> Tambah Admin
</a>

    <div class="card card-body">
        <div class="table-responsive">
            <table class="table table-hover datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Admin</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>
                                @if ($item->id > 1)
                                <a href="{{ route('admin.edit', $item->id) }}" class="btn text-primary btn-link py-0 px-2 text-decoration-none mx-1">
                                    <span class="fas fa-edit"></span>Edit
                                </a>
                                <a href="{{ route('admin.show', $item->id) }}" class="btn text-primary btn-link py-0 px-2 text-decoration-none mx-1">
                                    <span class="fas fa-eye"></span>Detail
                                </a>
                                <a href="#" onclick="deletAction('<?= route('admin.destroy', $item->id) ?>')" class="btn text-danger btn-link py-0 px-2 text-decoration-none mx-1">
                                    <span class="fas fa-trash"></span>Hapus
                                </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
<form action="{{ route('admin.destroy', 0) }}" method="post" id="delete-action" class="d-inline">
    @csrf
    @method('DELETE')
</form>
@endsection


@push('scripts')
    <script src="{{ asset('/js/plugin/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('/js/plugin/sweetalert/sweetalert.min.js') }}"></script>
    <script type="text/javascript">
        $(function() {
            $('.datatable').DataTable();
        })

        function deletAction(url) {
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
                title: "berhasil",
                text: "{{ session('success') }}",
                icon: "success",
                button: "OK",
            });
        </script>
    @endif
@endpush