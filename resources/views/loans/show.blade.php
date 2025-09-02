@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Detail Peminjaman #{{ $loan->id }}</h1>

    <div class="card mb-4">
        <div class="card-header">Informasi Peminjaman</div>
        <div class="card-body">
            <p><strong>Member:</strong> {{ $loan->member->name }} ({{ $loan->member->code }})</p>
            <p><strong>Tanggal Pinjam:</strong> {{ $loan->loan_date }}</p>
            <p><strong>Tanggal Kembali:</strong> {{ $loan->return_date ?? 'Belum dikembalikan' }}</p>
            <p><strong>Status:</strong> {{ $loan->status }}</p>
        </div>
    </div>

    <div class="card">
        <div class="card-header">Daftar Film yang Dipinjam</div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Kode Film</th>
                        <th>Judul</th>
                        <th>Genre</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($loan->loanItems as $item)
                        <tr>
                            <td>{{ $item->film->code }}</td>
                            <td>{{ $item->film->title }}</td>
                            <td>{{ $item->film->genre }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-4 d-flex justify-content-between">
        <a href="{{ route('loans.index') }}" class="btn btn-secondary">Kembali ke Daftar</a>

        @if ($loan->status === 'BORROWED')
            <form action="{{ route('loans.return', $loan->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success">Tandai Sudah Kembali</button>
            </form>
        @endif
    </div>
</div>
@endsection
