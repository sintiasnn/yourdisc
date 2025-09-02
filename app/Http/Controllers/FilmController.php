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
        $currentYear = (int) date('Y');
        $validated = $request->validate([
            'code' => 'required|string|unique:films,code',
            'title' => 'required|string',
            'genre' => 'nullable|string',
            'year' => 'required|integer|min:1900|max:' . $currentYear,
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
        $currentYear = (int) date('Y');
        $validated = $request->validate([
            'code' => 'required|string|unique:films,code,' . $film->id,
            'title' => 'required|string',
            'genre' => 'nullable|string',
            'year' => 'required|integer|min:1900|max:' . $currentYear,
            'stock' => 'required|integer|min:0',
        ]);

        // Gunakan hasil validasi untuk update
        $film->update($validated);

        return redirect()->route('films.index')->with('success', 'Film berhasil diperbarui.');
    }



    public function destroy(Film $film)
    {
        // Cegah hapus jika ada loan aktif (status PENDING)
        $hasActiveLoan = $film->loanItems()
            ->whereHas('loan', function ($q) {
                $q->where('status', 'PENDING');
            })
            ->exists();

        if ($hasActiveLoan) {
            return redirect()->route('films.index')
                ->with('error', 'Tidak dapat menghapus film yang sedang dipinjam.');
        }

        $film->delete();
        return redirect()->route('films.index')->with('success', 'Film berhasil dihapus.');
    }
}
