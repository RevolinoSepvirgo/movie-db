@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="row g-0">
            <div class="col-md-4">
                @php
                    $imageSrc = Str::startsWith($movie->cover_image, 'http')
                        ? $movie->cover_image
                        : asset('storage/' . $movie->cover_image);
                @endphp
                <img src="{{ $imageSrc }}" alt="{{ $movie->title }}" class="img-fluid h-100 w-100 object-cover rounded-start" style="object-fit: cover;">
            </div>
            <div class="col-md-8 p-4">
                <h2 class="text-2xl font-bold mb-3 text-black dark:text-white">{{ $movie->title }}</h2>
                <p class="text-sm text-gray-600 mb-2">
                    <strong>Kategori:</strong> {{ $movie->category->category_name ?? '-' }}<br>
                    <strong>Tahun:</strong> {{ $movie->year }}<br>
                    <strong>Aktor:</strong> {{ $movie->actors ?? '-' }}
                </p>

                <div class="mt-4">
                    <h4 class="text-lg font-semibold mb-2">Sinopsis</h4>
                    <p class="text-gray-700 leading-relaxed">{{ $movie->synopsis }}</p>
                </div>

            

                <div class="mt-3">
                    <a href="{{ route('movies.index') }}" class="text-blue-600 hover:underline">← Kembali ke daftar film</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
