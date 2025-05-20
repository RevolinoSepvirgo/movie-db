<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
{
   $movies = Movie::latest()->paginate(6); // Ambil 6 film per halaman, urutkan dari terbaru
    return view('movies.index', compact('movies'));
}


public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'slug' => 'required',
        'synopsis' => 'required',
        'category_id' => 'required|exists:categories,id',
        'year' => 'required|integer',
        'actors' => 'required',
        'cover_image' => 'required|url',
    ]);

    Movie::create($request->all());

    return redirect()->route('movies.index')->with('success', 'Film berhasil ditambahkan!');
}

public function create()
{
    $categories = Category::all();
    return view('movies.create', compact('categories'));
}

public function edit($id)
{

    $movie = Movie::findOrFail($id);
    $categories = Category::all(); // ambil semua kategori dari tabel categories

    return view('movies.edit', compact('movie', 'categories'));
}

public function update(Request $request, $id)
{
    // Validasi input
    $request->validate([
        'title' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
        'year' => 'required|integer',
        'actors' => 'required|string',
        'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Menemukan film berdasarkan ID
    $movie = Movie::findOrFail($id);

    // Update data film
    $movie->title = $request->title;
    $movie->category_id = $request->category_id;
    $movie->year = $request->year;
    $movie->actors = $request->actors;

    // Cek apakah ada gambar yang diupload
    if ($request->hasFile('cover_image')) {
        // Hapus gambar lama jika ada
        if ($movie->cover_image && file_exists(public_path('storage/' . $movie->cover_image))) {
            unlink(public_path('storage/' . $movie->cover_image));
        }
        // Simpan gambar baru
        $movie->cover_image = $request->file('cover_image')->store('movies', 'public');
    }

    // Simpan perubahan
    $movie->save();

    // Redirect setelah berhasil
    return redirect()->route('movies.index')->with('success', 'Film berhasil diperbarui!');
}

public function destroy($id)
{
    // Menemukan film berdasarkan ID
    $movie = Movie::findOrFail($id);

    // Hapus gambar jika ada
    if ($movie->cover_image && file_exists(public_path('storage/' . $movie->cover_image))) {
        unlink(public_path('storage/' . $movie->cover_image));
    }

    // Hapus data film
    $movie->delete();

    // Redirect setelah berhasil
    return redirect()->route('movies.index')->with('success', 'Film berhasil dihapus!');
}

public function homepage()
{
    return view(('test.template'));
}

public function show(Movie $movie)
{
    return view('movies.show', compact('movie'));
}


}
