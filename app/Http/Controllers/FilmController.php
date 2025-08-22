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
            'code' => 'required|string',
            'title' => 'required|string',
            'genre' => 'nullable|string',
            'year' => 'required|integer',
            'stock' => 'required|integer|min:0',
        ]);

        Film::create($validated);

        return redirect()->route('films.index')->with('success', 'Film berhasil ditambahkan.');
    }


    public function edit(Film $film)
    {
        return view('films.edit', compact('film'));
    }

    public function update(Request $request, $id)
    {
        $film = Film::findOrFail($id);

        // Tambahkan ini untuk validasi dan menyimpan ke variabel $validated
        $validated = $request->validate([
            'code' => 'required|string',
            'title' => 'required|string',
            'genre' => 'nullable|string',
            'year' => 'required|integer',
            'stock' => 'required|integer|min:0',
        ]);

        // Gunakan hasil validasi untuk update
        $film->update($validated);

        return redirect()->route('films.index')->with('success', 'Film berhasil diperbarui.');
    }



    public function destroy(Film $film)
    {
        $film->delete();
        return redirect()->route('films.index')->with('success', 'Film deleted successfully.');
    }
}
