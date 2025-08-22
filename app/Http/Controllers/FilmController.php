<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function index()
    {
        $films = Film::latest()->paginate(10);
        return view('films.index', compact('films'));
    }

    public function create()
    {
        return view('films.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:films,kode',
            'judul' => 'required',
            'genre' => 'required',
            'tahun' => 'required|integer',
            'stok' => 'required|integer|min:0',
        ]);

        Film::create($validated);

        return redirect()->route('films.index')->with('success', 'Film berhasil ditambahkan!');
    }

    public function edit(Film $film)
    {
        return view('films.edit', compact('film'));
    }

    public function update(Request $request, Film $film)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:films,kode,' . $film->id,
            'judul' => 'required',
            'genre' => 'required',
            'tahun' => 'required|integer',
            'stok' => 'required|integer|min:0',
        ]);

        $film->update($validated);

        return redirect()->route('films.index')->with('success', 'Film berhasil diperbarui!');
    }


    public function destroy(Film $film)
    {
        $film->delete();
        return redirect()->route('films.index')->with('success', 'Film deleted successfully.');
    }
}
