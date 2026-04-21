@extends('layouts.app')

@section('title', 'Tambah Admin')

@section('content')
    <div class="pt-2 pb-4">
        <h3 class="fw-bold mb-3">Tambah Admin</h3>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card card-body">
                <form action="{{ route('admin.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="name" class="form-label">Nama Admin</label>
                        <input type="text" class="form-control" @error('name') is-invalid @enderror id="name" name="name" value="{{ old('name') }}" placeholder="Masukkan Nama">
                        @error('name')
                           <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                           </span>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" @error('email') is-invalid @enderror id="email" name="email" value="{{ old('email') }}" placeholder="Masukkan Email">
                        @error('email')
                           <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                           </span>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" @error('password') is-invalid @enderror id="password" name="password" placeholder="Masukkan Password">
                        @error('password')
                           <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                           </span>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                        <input type="password" class="form-control" @error('password_confirmation') is-invalid @enderror id="password_confirmation" name="password_confirmation" placeholder="Masukkan Konfirmasi Password">
                        @error('password_confirmation')
                           <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                           </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('admin.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection