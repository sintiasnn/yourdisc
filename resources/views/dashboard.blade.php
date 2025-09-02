@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Dashboard</h1>
    <div class="row">
        {{-- Card untuk Jumlah Film --}}
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Total Film</div>
                <div class="card-body">
                    <h5 class="card-title display-4">{{ $filmCount }}</h5>
                    <p class="card-text">Judul film yang terdaftar.</p>
                </div>
            </div>
        </div>

        {{-- Card untuk Jumlah Member --}}
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Total Member</div>
                <div class="card-body">
                    <h5 class="card-title display-4">{{ $memberCount }}</h5>
                    <p class="card-text">Member yang terdaftar.</p>
                </div>
            </div>
        </div>

        {{-- Card untuk Peminjaman Aktif --}}
        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header">Peminjaman Aktif</div>
                <div class="card-body">
                    <h5 class="card-title display-4">{{ $activeLoanCount }}</h5>
                    <p class="card-text">Peminjaman yang sedang berjalan.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
