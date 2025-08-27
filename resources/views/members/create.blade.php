@extends('layouts.app')

@section('content')
    <h1>Tambah Member</h1>
    <form action="{{ route('members.store') }}" method="POST">
        @csrf
        @include('members.form')
        <button type="submit">Simpan</button>
    </form>
@endsection
