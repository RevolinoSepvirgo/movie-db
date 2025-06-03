{{-- filepath: d:\KULIAH\Semester4\WEB FRAMEWROK\movie-db\resources\views\Auth\register.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card shadow-lg p-4" style="width: 370px; border-radius: 1rem;">
        <h3 class="text-center mb-4" style="font-weight: bold; color: #4d534e;">Register Movie DB</h3>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" name="name" id="name" class="form-control" required value="{{ old('name') }}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" required value="{{ old('email') }}">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success w-100">Daftar</button>
        </form>
        <div class="mt-3 text-center">
            <small>Sudah punya akun? <a href="{{ route('login') }}">Login</a></small>
        </div>
    </div>
</div>
@endsection
