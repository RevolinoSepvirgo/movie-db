@extends('layouts.app')

<style>
    .pagination .page-item.active .page-link {
        background-color: #28a745; /* warna hijau Bootstrap */
        border-color: #28a745;
        color: white;
    }

    .pagination .page-link {
        color: #28a745;
    }

    .pagination .page-link:hover {
        background-color: #e6f4ea;
        color: #1d7a35;
    }
</style>

@section('content')
<div class=" continer">
    <h1 class="md-4 text-center text-dark" style="text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);">Daftar Film</h1>

    {{-- Tombol Tambah Film --}}
   <a href="{{ route('movies.create') }}" class="btn btn-success mb-3" style="transition: all 0.3s ease;">
    <i class="bi bi-plus-circle"></i> Tambah Film
</a>


    <div class="row">
        @forelse ($movies as $movie)
            <div class="col-md-6 mb-4">
                <div class="card h-100 border-2 rounded-4" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.6), 0 6px 20px rgba(0, 0, 0, 0.4);"
>

                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ $movie->cover_image }}" class="img-fluid rounded-start" alt="{{ $movie->title }}" style="height: 100%; object-fit: cover;">
                        </div>
                        <div class="col-md-8 d-flex flex-column p-3">
                            <h5 class="card-title">{{ $movie->title }}</h5>
                            <p class="card-text text-muted mb-2">
                                <strong>Kategori:</strong> {{ $movie->category->category_name ?? '-' }}<br>
                                <strong>Tahun:</strong> {{ $movie->year }}<br>
                                <strong>Actors:</strong> {{ $movie->actors }}<br>
                                <strong>Sinopsis:</strong><br> {{ Str::limit($movie->synopsis, 100, '...') }}
                            </p>
                            <div class="text-end mt-2">
                                <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-sm btn-success ms-2">
                                    <i class="bi bi-eye"></i> Read More
                                </a>
                            </div>


                            {{-- <div class="mt-auto d-flex justify-content-between">
                                <div class="d-flex gap-2">
                                    <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus film ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                                <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-sm text-white" style="background-color: #343a40;">
                                    <i class="bi bi-info-circle"></i> Detail
                                </a>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center text-muted">Belum ada data film.</p>
        @endforelse
    </div>

    {{-- Pagination --}}
    <div class="mt-4 bg-succes">
        {{ $movies->links() }}
    </div>
</div>
@endsection
