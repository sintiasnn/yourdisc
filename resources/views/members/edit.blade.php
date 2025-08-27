@extends('layouts.app')

@section('content')
    <h1>Edit Member</h1>
    <form action="{{ route('members.update', $member) }}" method="POST">
        @csrf
        @method('PUT')
        @include('members.form')
        <button type="submit">Perbarui</button>
    </form>
@endsection
