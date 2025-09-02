@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Daftar Peminjaman</h1>

        <a href="{{ route('loans.create') }}" class="btn btn-primary mb-3">Tambah Peminjaman</a>

        <form method="GET" class="row g-2 mb-3">
            <div class="col-md-3">
                <select name="status" class="form-select">
                    <option value="">Semua Status</option>
                    <option value="PENDING" {{ request('status')==='PENDING' ? 'selected' : '' }}>PENDING</option>
                    <option value="RETURNED" {{ request('status')==='RETURNED' ? 'selected' : '' }}>RETURNED</option>
                    <option value="OVERDUE" {{ request('status')==='OVERDUE' ? 'selected' : '' }}>OVERDUE</option>
                </select>
            </div>
            <div class="col-md-4">
                <select name="member_id" class="form-select">
                    <option value="">Semua Member</option>
                    @isset($members)
                        @foreach($members as $m)
                            <option value="{{ $m->id }}" {{ (string)request('member_id')===(string)$m->id ? 'selected' : '' }}>{{ $m->name }}</option>
                        @endforeach
                    @endisset
                </select>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-outline-primary">Filter</button>
                <a href="{{ route('loans.index') }}" class="btn btn-outline-secondary">Reset</a>
            </div>
        </form>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Member</th>
                    <th>Tanggal Pinjam</th>
                    <th>Jatuh Tempo</th>
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
                        <td>
                            {{ $loan->due_date }}
                            @if ($loan->status === 'PENDING' && \Carbon\Carbon::parse($loan->due_date)->isPast())
                                <span class="badge bg-danger ms-2">OVERDUE</span>
                            @endif
                        </td>
                        <td>{{ $loan->returned_at ?? '-' }}</td>
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
