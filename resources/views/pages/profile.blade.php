@extends('layouts.app')

@section('title', 'Profil')

@section('content')
    <div class="pt-2 pb-4">
        <h3 class="fw-bold mb-3">Profile saya</h3>
    </div>

    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class=" form-group mb-3">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" @error('name') is-invalid @enderror id="name" name="name" value="{{ Auth::user()->name }}" required>
                            @error('name')
                               <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                               </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control"  @error('email') is-invalid @enderror id="email" name="email" value="{{ Auth::user()->email }}" required>
                            @error('email')
                               <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                               </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection