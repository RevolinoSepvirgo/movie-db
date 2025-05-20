@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Tambah Film Baru</h1>

    <form method="POST" action="{{ route('movies.store') }}">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" name="slug" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="synopsis" class="form-label">Sinopsis</label>
            <textarea name="synopsis" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Kategori</label>
            <select name="category_id" class="form-control" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="year" class="form-label">Tahun</label>
            <input type="number" name="year" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="actors" class="form-label">Actors</label>
            <input type="text" name="actors" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="cover_image" class="form-label">URL Gambar Cover</label>
            <input type="text" name="cover_image" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('movies.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
