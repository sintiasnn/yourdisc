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
        $request->validate([
            'code' => 'required|unique:films,code',
            'title' => 'required',
            'genre' => 'nullable',
            'year' => 'nullable|numeric',
            'stock' => 'required|integer|min:0',
        ]);

        Film::create($request->all());
        return redirect()->route('films.index')->with('success', 'Film created successfully.');
    }

    public function edit(Film $film)
    {
        return view('films.edit', compact('film'));
    }

    public function update(Request $request, Film $film)
    {
        $request->validate([
            'code' => 'required|unique:films,code,' . $film->id,
            'title' => 'required',
            'genre' => 'nullable',
            'year' => 'nullable|numeric',
            'stock' => 'required|integer|min:0',
        ]);

        $film->update($request->all());
        return redirect()->route('films.index')->with('success', 'Film updated successfully.');
    }

    public function destroy(Film $film)
    {
        $film->delete();
        return redirect()->route('films.index')->with('success', 'Film deleted successfully.');
    }
}
