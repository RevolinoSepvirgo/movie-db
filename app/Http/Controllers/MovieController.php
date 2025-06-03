<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MovieController extends Controller
{
    public function index(Request $request)
{
    $query = Movie::query();

    // Filter search
    if ($request->filled('search')) {
        $query->where('title', 'like', '%' . $request->search . '%');
    }

    // Filter kategori (opsional)
    if ($request->filled('category')) {
        $query->where('category_id', $request->category);
    }
   $movies = Movie::latest()->paginate(6); // Ambil 6 film per halaman, urutkan dari terbaru
    return view('movies.index', compact('movies'));
}


public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        // 'slug' => 'required',
        'synopsis' => 'required',
        'category_id' => 'required|exists:categories,id',
        'year' => 'required|integer',
        'actors' => 'required',
        'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);
    $slug = Str::slug($request->title);

        $count = Movie::where('slug', $slug)->count();
        if ($count > 0) {
            $slug .= '-' . ($count + 1);
        }



    if ($request->hasFile('cover_image')) {
        $cover = $request->file('cover_image')->store('movies', 'public');
    }

    Movie::create([
        'title' => $request->title,
        'slug' => $slug,
        'synopsis' => $request->synopsis,
        'category_id' => $request->category_id,
        'year' => $request->year,
        'actors' => $request->actors,
        'cover_image' => $cover ?? null,
    ]);

    return redirect()->route('movies.index')->with('success', 'Film berhasil ditambahkan!');
}


public function create()
{
    $categories = Category::all();
    return view('movies.create', compact('categories'));
}


public function edit(Movie $movie)
{

    // $movie = Movie::findOrFail($id);
    $categories = Category::all(); // ambil semua kategori dari tabel categories

    return view('movies.edit', compact('movie', 'categories'));
}

public function update(Request $request,Movie $movie)
{
// Validasi input
    $request->validate([
        'title' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
        'year' => 'required|integer',
        'actors' => 'required|string',
        'synopsis'=> 'required|string',
        'cover_image' =>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Update slug jika judul berubah
    $slug = Str::slug($request->title);
    $count = Movie::where('slug', $slug)->where('id', '!=', $movie->id)->count();
    if ($count > 0) {
        $slug .= '-' . ($count + 1);
    }

    // Update data film
    $movie->title = $request->title;
    $movie->slug = $slug;
    $movie->category_id = $request->category_id;
    $movie->year = $request->year;
    $movie->synopsis = $request->synopsis;
    $movie->actors = $request->actors;

    // Jika ada file baru diupload
    if ($request->hasFile('cover_image')) {
        // Hapus gambar lama jika ada
        if ($movie->cover_image && file_exists(public_path('storage/' . $movie->cover_image))) {
            unlink(public_path('storage/' . $movie->cover_image));
        }
        $movie->cover_image = $request->file('cover_image')->store('movies', 'public');
    }

    $movie->save();

    return redirect()->route('movies.index')->with('success', 'Film berhasil diperbarui!');
}

public function destroy(Movie $movie)
{
    // Menemukan film berdasarkan ID
    // $movie = Movie::findOrFail($id);

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
