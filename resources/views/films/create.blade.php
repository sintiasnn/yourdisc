@extends('layouts.app')

@section('content')
<h1>Tambah Film</h1>

<a href="{{ route('films.index') }}">← Kembali ke daftar</a>

<form action="{{ route('films.store') }}" method="POST">
    @csrf
    @include('films.form', ['film' => null])
    <button type="submit">Simpan</button>
</form>
@endsection
