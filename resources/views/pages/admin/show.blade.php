@extends('layouts.app')

@section('title', 'Admin')

@section('content')
    <div class="pt-2 pb-4">
        <h3 class="fw-bold mb-3">Detail Admin</h3>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class=" card card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Nama Admin</th>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <th>Ditambahkan Pada</th>
                        <td>{{ \Carbon\Carbon::parse($user->created_at)->isoFormat('DD/MM/YYYY HH:mm') }}</td>
                    </tr>
                    <tr>
                        <th>Terakhir Di update</th>
                        <td>{{ \Carbon\Carbon::parse($user->updated_at)->isoFormat('DD/MM/YYYY HH:mm') }}</td>
                    </tr>
                </table>
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.index') }}" class="btn btn-secondary">
                        <span class="bi bi-arrow-left"></span> Kembali
                    </a>
                    <a href="{{ route('admin.edit', $user->id) }}" class="btn btn-primary">
                        <span class="bi bi-pencil"></span> Edit
                    </a>
                   <button type="button" class="btn btn-danger btn-sm" onclick="deletAction('<?= route('admin.destroy', $user->id) ?>')">Hapus</button>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('admin.destroy', $user->id) }}" method="post" id="form-delete">
        @csrf
        @method('DELETE')
    </form>
@endsection

@push('scripts')
    <script src="{{ asset('/js/plugin/sweetalert/sweetalert.min.js') }}"></script>
    <script>
        function actionToDelete() {
            swal({
                title: "Apakah Anda yakin?",
                text: "Data yang sudah dihapus tidak dapat dikembalikan!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((confirm) => {
                if (confirm) {
                    $('#form-delete').attr('action', url);
                    $('#form-delete').submit();
                }
            });
        }
    </script>