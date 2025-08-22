<div style="margin-bottom: 1rem;">
    <label for="code">Kode</label><br>
    <input
        type="text"
        name="code"
        id="code"
        value="{{ old('code', $film->code ?? '') }}"
        required
    >
    @error('code')
        <div style="color: red;">{{ $message }}</div>
    @enderror
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
    @error('title')
        <div style="color: red;">{{ $message }}</div>
    @enderror
</div>

<div style="margin-bottom: 1rem;">
    <label for="genre">Genre</label><br>
    <input
        type="text"
        name="genre"
        id="genre"
        value="{{ old('genre', $film->genre ?? '') }}"
    >
    @error('genre')
        <div style="color: red;">{{ $message }}</div>
    @enderror
</div>

<div style="margin-bottom: 1rem;">
    <label for="year">Tahun</label><br>
    <input
        type="number"
        name="year"
        id="year"
        value="{{ old('year', $film->year ?? '') }}"
        min="1900"
        max="{{ now()->year }}"
    >
    @error('year')
        <div style="color: red;">{{ $message }}</div>
    @enderror
</div>

<div style="margin-bottom: 1rem;">
    <label for="stock">Stok</label><br>
    <input
        type="number"
        name="stock"
        id="stock"
        value="{{ old('stock', $film->stock ?? 0) }}"
        min="0"
        required
    >
    @error('stock')
        <div style="color: red;">{{ $message }}</div>
    @enderror
</div>
