@extends('contoh.layout')
@section('content')
<div class="main-content">
    <h2>Edit Kamar</h2>
    <form method="POST" action="{{ route('kamar.update', $room->id) }}">
        @csrf
        @method('PUT')
        <div>
            <label>Nama Kamar</label>
            <input type="text" name="nama" value="{{ $room->nama }}" required>
        </div>
        <div style="margin-top:10px;">
            <label>Tipe</label>
            <input type="text" name="tipe" value="{{ $room->tipe }}" required>
        </div>
        <div style="margin-top:10px;">
            <label>Harga</label>
            <input type="number" name="harga" value="{{ $room->harga }}" required>
        </div>
        <div style="margin-top:10px;">
            <label>Status</label>
            <select name="status" required>
                <option value="tersedia" @if($room->status=='tersedia') selected @endif>Tersedia</option>
                <option value="terisi" @if($room->status=='terisi') selected @endif>Terisi</option>
            </select>
        </div>
        <div style="margin-top:18px;">
            <button type="submit" class="btn">Update</button>
            <a href="{{ route('kamar.index') }}" class="btn" style="background:#aaa;">Batal</a>
        </div>
    </form>
</div>
@endsection 