@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Tambah Peminjaman Baru</h1>

        <form action="{{ route('loans.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="member_id" class="form-label">Pilih Member</label>
                <select class="form-control" id="member_id" name="member_id" required>
                    <option value="">-- Pilih Member --</option>
                    @foreach($members as $member)
                        <option value="{{ $member->id }}" {{ old('member_id') == $member->id ? 'selected' : '' }}>
                            {{ $member->name }}
                        </option>
                    @endforeach
                </select>
                @error('member_id')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="film_ids" class="form-label">Pilih Film (bisa lebih dari satu)</label>
                <select multiple class="form-control" id="film_ids" name="film_ids[]" required>
                    @foreach($films as $film)
                        <option value="{{ $film->id }}" {{ collect(old('film_ids', []))->contains($film->id) ? 'selected' : '' }}>
                            {{ $film->title }} (stok: {{ $film->stock }})
                        </option>
                    @endforeach
                </select>
                @error('film_ids')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="loan_date" class="form-label">Tanggal Pinjam</label>
                <input type="date" class="form-control" id="loan_date" name="loan_date" value="{{ old('loan_date', date('Y-m-d')) }}" required>
                @error('loan_date')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('loans.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
