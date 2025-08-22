@if ($errors->any())
    <div style="color: red; margin-bottom: 1rem;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div style="margin-bottom: 1rem;">
    <label for="code">Kode</label><br>
    <input
        type="text"
        name="code"
        id="code"
        value="{{ old('code', $film->code ?? '') }}"
        required
    >
</div>

<div style="margin-bottom: 1rem;">
    <label for="title">Judul</label><br>
    <input
        type="text"
        name="title"
        id="title"
        value="{{ old('title', $film->title ?? '') }}"
        required
    >
</div>

<div style="margin-bottom: 1rem;">
    <label for="genre">Genre</label><br>
    <input
        type="text"
        name="genre"
        id="genre"
        value="{{ old('genre', $film->genre ?? '') }}"
    >
</div>

<div style="margin-bottom: 1rem;">
    <label for="year">Tahun</label><br>
    <input
        type="number"
        name="year"
        id="year"
        min="1900"
        max="{{ now()->year }}"
        value="{{ old('year', $film->year ?? '') }}"
    >
</div>

<div style="margin-bottom: 1rem;">
    <label for="stock">Stok</label><br>
    <input
        type="number"
        name="stock"
        id="stock"
        min="0"
        value="{{ old('stock', $film->stock ?? 0) }}"
        required
    >
</div>
