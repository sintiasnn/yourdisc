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
                <th>Judul</th>
                <th>Genre</th>
                <th>Durasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($films as $film)
    <tr>
        <td>{{ $film->title }}</td>
        <td>{{ $film->genre }}</td>
        <td>menit</td>
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
        {{ $films->links() }}
    </div>
@endsection
