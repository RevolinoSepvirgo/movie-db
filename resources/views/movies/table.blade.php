{{-- filepath: d:\KULIAH\Semester4\WEB FRAMEWROK\movie-db\resources\views\movies\table.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header bg-success text-white fw-bold">
        Data Film
        <a href="{{ route('movies.create') }}" class="btn btn-light btn-sm float-end">
            <i class="bi bi-plus-circle"></i> Tambah Film
        </a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped align-middle mb-0">
                <thead class="table-success">
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Tahun</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($movies as $movie)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $movie->title }}</td>
                            <td>{{ $movie->category->category_name ?? '-' }}</td>
                            <td>{{ $movie->year }}</td>



                            <td class="text-center">
                                <a href="{{ route('movies.show', $movie->slug) }}" class="btn btn-info btn-sm" title="Detail">
                                    <i class="bi bi-eye"></i>
                                </a>
                                @auth


                                <a href="{{ route('movies.edit', $movie->slug) }}" class="btn btn-warning btn-sm" title="Edit">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('movies.destroy', $movie->slug) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus film ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" title="Hapus">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                                 @endauth
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">Belum ada data film.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
