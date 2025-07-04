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
            <label>Tipe Kamar</label>
            <select name="room_type_id" required>
                @foreach ($roomTypes as $type)
                    <option value="{{ $type->id }}" @if($room->room_type_id == $type->id) selected @endif>
                        {{ $type->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div style="margin-top:10px;">
            <label>Harga</label>
            <input type="number" name="harga" value="{{ $room->harga }}" required>
        </div>

        <div style="margin-top:10px;">
            <label>Status</label>
            <select name="status" required>
                <option value="tersedia" @if($room->status == 'tersedia') selected @endif>Tersedia</option>
                <option value="terisi" @if($room->status == 'terisi') selected @endif>Terisi</option>
            </select>
        </div>

        <div style="margin-top:18px;">
            <button type="submit" class="btn">Update</button>
            <a href="{{ route('kamar.index') }}" class="btn" style="background:#aaa;">Batal</a>
        </div>
    </form>
</div>
@endsection
