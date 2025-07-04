@extends('contoh.layout')
@section('content')
<div class="main-content">
    <h2>Tambah Reservasi</h2>
    <form method="POST" action="{{ route('reservasi.store') }}">
        @csrf
        <div>
            <label>User</label>
            <select name="user_id" required>
                <option value="">Pilih User</option>
                @foreach($users as $u)
                    <option value="{{ $u->id }}">{{ $u->name }}</option>
                @endforeach
            </select>
        </div>
        <div style="margin-top:10px;">
            <label>Kamar</label>
            <select name="room_id" required>
                <option value="">Pilih Kamar</option>
                @foreach($rooms as $k)
                    <option value="{{ $k->id }}">{{ $k->nama }} ({{ $k->tipe }})</option>
                @endforeach
            </select>
        </div>
        <div style="margin-top:10px;">
            <label>Tanggal Mulai</label>
            <input type="date" name="tanggal_mulai" required>
        </div>
        <div style="margin-top:10px;">
            <label>Tanggal Selesai</label>
            <input type="date" name="tanggal_selesai" required>
        </div>
        <div style="margin-top:10px;">
            <label>Status</label>
            <select name="status" required>
                <option value="pending">Pending</option>
                <option value="confirmed">Confirmed</option>
                <option value="cancelled">Cancelled</option>
            </select>
        </div>
        <div style="margin-top:18px;">
            <button type="submit" class="btn">Simpan</button>
            <a href="{{ route('reservasi.index') }}" class="btn" style="background:#aaa;">Batal</a>
        </div>
    </form>
</div>
@endsection 