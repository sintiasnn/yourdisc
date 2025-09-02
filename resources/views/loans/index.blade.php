@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Daftar Peminjaman</h1>

        <a href="{{ route('loans.create') }}" class="btn btn-primary mb-3">Tambah Peminjaman</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Member</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($loans as $loan)
                    <tr>
                        <td>{{ $loan->id }}</td>
                        <td>{{ $loan->member->name }}</td>
                        <td>{{ $loan->loan_date }}</td>
                        <td>{{ $loan->return_date ?? '-' }}</td>
                        <td>{{ $loan->status }}</td>
                        <td>
                            <a href="{{ route('loans.show', $loan->id) }}" class="btn btn-sm btn-info">Detail</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada data peminjaman.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
