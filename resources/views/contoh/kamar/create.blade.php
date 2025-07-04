@extends('contoh.layout')
@section('content')
<div class="main-content">
    <h2>Tambah Kamar</h2>
    <form method="POST" action="{{ route('kamar.store') }}">
        @csrf
        <div>
            <label>Nama Kamar</label>
            <input type="text" name="nama" required>
        </div>
        <div style="margin-top:10px;">
            <label>Tipe</label>
            <input type="text" name="tipe" required>
        </div>
        <div style="margin-top:10px;">
            <label>Harga</label>
            <input type="number" name="harga" required>
        </div>
        <div style="margin-top:10px;">
            <label>Status</label>
            <select name="status" required>
                <option value="tersedia">Tersedia</option>
                <option value="terisi">Terisi</option>
            </select>
        </div>
        <div style="margin-top:18px;">
            <button type="submit" class="btn">Simpan</button>
            <a href="{{ route('kamar.index') }}" class="btn" style="background:#aaa;">Batal</a>
        </div>
    </form>
</div>
@endsection 