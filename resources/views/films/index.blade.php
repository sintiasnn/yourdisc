@extends('layouts.app')

@section('content')
    <h1>Daftar Film</h1>

    <a href="{{ route('films.create') }}">Tambah Film</a>

    <table>
        <thead>
            <tr>
                <th>Judul</th>
                <th>Genre</th>
                <th>Durasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($films as $film)
                <tr>
                    <td>{{ $film->title }}</td>
                    <td>{{ $film->genre }}</td>
                    <td>{{ $film->duration }} menit</td>
                    <td>
                        <a href="{{ route('films.edit', $film) }}">Edit</a>
                        <form action="{{ route('films.destroy', $film) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4">Tidak ada data film.</td></tr>
            @endforelse
        </tbody>
    </table>

    {{ $films->links() }}
@endsection
