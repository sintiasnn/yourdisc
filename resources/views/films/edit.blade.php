@extends('layouts.app')

@section('content')
<h1>Edit Film</h1>

<a href="{{ route('films.index') }}">← Kembali ke daftar</a>

<form action="{{ route('films.update', $film) }}" method="POST">
    @csrf
    @method('PUT')
    @include('films.form', ['film' => $film])
    <button type="submit">Update</button>
</form>
@endsection
