@extends('layouts.app')

@section('content')
    <h1>Daftar Film</h1>

    <a href="{{ route('films.create') }}">Tambah Film</a>

    {{-- Flash message sukses --}}
    @if (session('success'))
        <div style="color: green; margin-top: 10px;">
            {{ session('success') }}
        </div>
    @endif

    <table border="0" cellpadding="8">
        <thead>
            <tr>
                <th>kode film</th>
                <th>Judul</th>
                <th>Genre</th>
                <th>tahun release</th>
                <th>stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($films as $film)
    <tr>
        <td>{{ $film->code }}</td>
        <td>{{ $film->title }}</td>
        <td>{{ $film->genre }}</td>
        <td>{{ $film->year }}</td>
        <td>{{ $film->stock }}</td>
        <td>
            <a href="{{ route('films.edit', $film->id) }}">Edit</a>
            <form action="{{ route('films.destroy', $film->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Hapus</button>
            </form>
        </td>
    </tr>
@endforeach

        </tbody>
    </table>

    <div style="margin-top: 10px;">
        {{ $films->links('pagination::semantic-ui') }}
    </div>
@endsection
