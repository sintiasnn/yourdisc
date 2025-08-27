@extends('layouts.app')

@section('content')
    <h1>Daftar Member</h1>
    <a href="{{ route('members.create') }}">Tambah Member</a>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama</th>
                <th>No. telpon</th>
                <th>alamat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($members as $member)
                <tr>
                    <td>{{ $member->code }}</td>
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->phone}}</td>
                    <td>{{ $member->address}}</td>
                    <td>
                        <a href="{{ route('members.edit', $member) }}">Edit</a>
                        <form action="{{ route('members.destroy', $member) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Hapus member ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
