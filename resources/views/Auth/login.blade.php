{{-- filepath: d:\KULIAH\Semester4\WEB FRAMEWROK\movie-db\resources\views\Auth\login.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card shadow-lg p-4" style="width: 350px; border-radius: 1rem;">
        <h3 class="text-center mb-4" style="font-weight: bold; color: #4d534e;">Login Movie DB</h3>
        
        <form method="POST" action="/login">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" required autofocus value="{{ old('email') }}">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" name="remember" id="remember" class="form-check-input">
                <label for="remember" class="form-check-label">Ingat Saya</label>
            </div>
            <button type="submit" class="btn btn-success w-100">Login</button>
        </form>
        {{-- <div class="mt-3 text-center">
            <small>Belum punya akun? <a href="{{ route('register') }}">Daftar</a></small>
        </div> --}}
    </div>
</div>
@endsection
