@extends('layouts.app')

@section('content')
<div class="container bg-dark  p-4 rounded">
    <h1 class="mb-4 text-center text-light" style="text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);">Daftar Film</h1>


    {{-- Tambah Film Button --}}
   <a href="{{ route('movies.create') }}" class="btn btn-primary mb-3" style="background-color: #0056b3; border-color: #004085; transition: all 0.3s ease;">
    <i class="bi bi-plus-circle"></i> Tambah Film
</a>


    <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
        @forelse ($movies as $movie)
        <div class="col">
            <div class="card shadow-sm border-0 h-100 rounded-3">
                <img src="{{ $movie->cover_image }}" class="card-img-top" alt="{{ $movie->title }}" style="height: 300px; object-fit: cover;">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title text-truncate" style="max-width: 100%;">{{ $movie->title }}</h5>
                    <p class="card-text mb-4 text-muted">
                        <strong>Kategori:</strong> {{ $movie->category->category_name ?? '-' }}<br>
                        <strong>Tahun:</strong> {{ $movie->year }}<br>
                        <strong>Actors:</strong> {{ $movie->actors }}
                    </p>
                    <div class="mt-auto d-flex justify-content-between align-items-center">
                        <div class="d-flex gap-2">
                            <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil-square"></i> 
                            </a>
                            <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus film ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>

                        </div>
                        <div>
                            <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-sm text-white" style="background-color: #343a40;">
                                <i class="bi bi-info-circle"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <p class="text-center text-muted">Belum ada data film.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
