@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div style="margin-bottom: 1rem;">
    <label for="name">Nama</label><br>
    <input type="text" name="name" id="name" value="{{ old('name', $member->name ?? '') }}" required>
    @error('name') <div style="color:red;">{{ $message }}</div> @enderror
</div>

<div style="margin-bottom: 1rem;">
    <label for="phone">No.Telpon</label><br>
    <input type="phone" name="phone" id="phone" value="{{ old('phone', $member->phone ?? '') }}" required>
    @error('phone') <div style="color:red;">{{ $message }}</div> @enderror
</div>

<div style="margin-bottom: 1rem;">
    <label for="address">alamat</label><br>
    <input type="address" name="address" id="address" value="{{ old('address', $member->address ?? '') }}" required>
    @error('address') <div style="color:red;">{{ $message }}</div> @enderror
</div>