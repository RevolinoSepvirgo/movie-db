@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 text-center">Tambah Film Baru</h1>

    <form method="POST" action="{{ route('movies.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3 row">
            <label for="title" class="col-sm-2 col-form-label text-end">Judul</label>
            <div class="col-sm-10">
                <input type="text" name="title" class="form-control" required>
            </div>
        </div>

        {{-- <div class="mb-3 row">
            <label for="slug" class="col-sm-2 col-form-label text-end">Slug</label>
            <div class="col-sm-10">
                <input type="text" name="slug" class="form-control" required>
            </div> --}}
        </div>

        <div class="mb-3 row">
            <label for="synopsis" class="col-sm-2 col-form-label text-end">Sinopsis</label>
            <div class="col-sm-10">
                <textarea name="synopsis" class="form-control" rows="3" required></textarea>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="category_id" class="col-sm-2 col-form-label text-end">Kategori</label>
            <div class="col-sm-10">
                <select name="category_id" class="form-control" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="year" class="col-sm-2 col-form-label text-end">Tahun</label>
            <div class="col-sm-10">
                <input type="number" name="year" class="form-control" required>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="actors" class="col-sm-2 col-form-label text-end">Actors</label>
            <div class="col-sm-10">
                <input type="text" name="actors" class="form-control" required>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="cover_image" class="col-sm-2 col-form-label text-end">Gambar Cover</label>
            <div class="col-sm-10">
                <input type="file" name="cover_image" class="form-control" accept="image/*" required>
            </div>
        </div>

        <div class="text-end">
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('movies.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</div>
@endsection
