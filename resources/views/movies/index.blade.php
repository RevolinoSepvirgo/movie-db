@extends('layouts.app')

<style>
    .pagination .page-item.active .page-link {
        background-color: #4d534e; /* warna hijau Bootstrap */
        border-color: #454a46;
        color: white;
    }

    .pagination .page-link {
        color: #454a46;
    }

    .pagination .page-link:hover {
        background-color: #e6f4ea;
        color:#454a46;
    }
</style>

@section('content')
<div class=" continer">
    <div>
    <h1 class="md-4 text-center text-dark" style="font-size: 2.0rem; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);">Daftar Film</h1>
</div>

    {{-- Tombol Tambah Film --}}
   <a href="{{ route('movies.create') }}" class="btn btn-primary mb-3" style="transition: all 0.3s ease;">
    <i class="bi bi-plus-circle"></i> Tambah Film
</a>

<form method="GET" class="mb-8 flex flex-col sm:flex-row sm:items-center sm:space-x-4 space-y-4 sm:space-y-0">
        <input
            type="text" name="search" value="{{ request('search') }}"
            placeholder="Cari judul film..."
            class="flex-grow sm:flex-shrink-0 px-4 py-2 border border-gray-300 rounded-lg shadow-sm
                   focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent
                   dark:bg-gray-800 dark:text-white dark:border-gray-600"
        >
        <select name="category"
            class="w-full sm:w-48 px-4 py-2 border border-gray-300 rounded-lg shadow-sm
                   focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent
                   dark:bg-gray-800 dark:text-white dark:border-gray-600">
            <option value="">Semua Kategori</option>
            @foreach(App\Models\Category::all() as $category)
                <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                    {{ $category->category_name }}
                </option>
            @endforeach
        </select>
        <button
            class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-2 rounded-lg shadow-md
                   transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
            Filter
        </button>
    </form>


    <div class="row">
        @forelse ($movies as $movie)
            <div class="col-md-6 mb-4">
                <div class="card h-100 border-2 rounded-4" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.6), 0 6px 20px rgba(0, 0, 0, 0.4);"
>

                    <div class="row g-0">
                        <div class="col-md-4">
                        @php
                            $imageSrc = Str::startsWith($movie->cover_image, 'http')
                                ? $movie->cover_image
                                : asset('storage/' . $movie->cover_image);
                        @endphp
                        <img src="{{ $imageSrc }}" class="img-fluid h-100 rounded-start object-fit-cover" alt="{{ $movie->title }}" style="object-fit: cover;">
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
                                <a href="{{ route('movies.show', $movie->slug) }}" class="btn btn-sm btn-success ms-2">
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
