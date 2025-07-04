@extends('contoh.layout')
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-white px-3 py-2 mb-4 rounded shadow-sm">
        <li class="breadcrumb-item"><a href="{{ route('room_types.index') }}">Tipe Kamar</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah</li>
    </ol>
</nav>
<h2 class="fw-bold mb-4" style="color:#6c4ee6;">Tambah Tipe Kamar</h2>
<form action="{{ route('room_types.store') }}" method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm">
    @csrf
    <div class="mb-3">
        <label for="nama" class="form-label">Nama Tipe Kamar</label>
        <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" required>
        @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="mb-3">
        <label for="deskripsi" class="form-label">Deskripsi</label>
        <textarea name="deskripsi" id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="3">{{ old('deskripsi') }}</textarea>
        @error('deskripsi')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="mb-3">
        <label for="gambar" class="form-label">Gambar</label>
        <input type="file" name="gambar" id="gambar" class="form-control @error('gambar') is-invalid @enderror" accept="image/*" onchange="previewGambar(event)">
        @error('gambar')<div class="invalid-feedback">{{ $message }}</div>@enderror
        <div class="mt-2">
            <img id="preview" src="#" alt="Preview Gambar" style="display:none;max-height:200px;" class="rounded shadow">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('room_types.index') }}" class="btn btn-secondary">Batal</a>
</form>
<script>
function previewGambar(event) {
    const [file] = event.target.files;
    if (file) {
        const preview = document.getElementById('preview');
        preview.src = URL.createObjectURL(file);
        preview.style.display = 'block';
    }
}
</script>
@endsection 