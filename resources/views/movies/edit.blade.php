@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Film</h1>

    <form action="{{ route('movies.update', $movie->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $movie->title) }}" required>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Kategori</label>
            <select name="category_id" id="category_id" class="form-control" required>
                <option value="">Pilih Kategori</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $movie->category_id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="year" class="form-label">Tahun</label>
            <input type="number" name="year" id="year" class="form-control" value="{{ old('year', $movie->year) }}" required>
        </div>

        <div class="mb-3">
            <label for="actors" class="form-label">Actors</label>
            <input type="text" name="actors" id="actors" class="form-control" value="{{ old('actors', $movie->actors) }}" required>
        </div>
        <div class="mb-3">
            <label for="synopsis" class="form-label">synopsis</label>
            <input type="text" name="synopsis" id="synopsis" class="form-control" value="{{ old('synopsis', $movie->synopsis) }}" required>
        </div>

        <div class="mb-3">
            <label for="cover_image" class="form-label">Gambar</label>
            <input type="file" name="cover_image" id="cover_image" class="form-control">
            @if($movie->cover_image)
                <img src="{{ asset('storage/' . $movie->cover_image) }}" alt="Cover Image" class="mt-2" width="100">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update Film</button>
    </form>
</div>
@endsection
