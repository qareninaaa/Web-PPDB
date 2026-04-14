@extends('layouts.app')

@section('title', 'Ubah Password')

@section('content')
    <div class="pt-2 pb-4">
        <h3 class="fw-bold mb-3">Ubah Password</h3>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <form action="{{ route('password.update') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="old_password" class="form-label">Password Lama</label>
                            <input type="password" class="form-control" @error('old_password') is-invalid @enderror id="old_password" name="old_password">
                            @error('old_password')
                               <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                               </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="password" class="form-label">Password Baru</label>
                            <input type="password" class="form-control" @error('password') is-invalid @enderror id="password" name="password">
                            @error('password')
                               <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                               </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="password_confirmation" class="form-label">Konfirmasi Password Baru</label>
                            <input type="password" class="form-control" @error('password_confirmation') is-invalid @enderror id="password_confirmation" name="password_confirmation">
                            @error('password_confirmation')
                               <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                               </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
   <script src="{{ asset('/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

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