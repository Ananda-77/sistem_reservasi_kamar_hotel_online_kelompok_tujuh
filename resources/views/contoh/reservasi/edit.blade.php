@extends('contoh.layout')
@section('content')
<div class="main-content">
    <h2>Edit Reservasi</h2>
    <form method="POST" action="{{ route('reservasi.update', $reservation->id) }}">
        @csrf
        @method('PUT')
        <div>
            <label>User</label>
            <select name="user_id" required>
                <option value="">Pilih User</option>
                @foreach($users as $u)
                    <option value="{{ $u->id }}" @if($reservation->user_id == $u->id) selected @endif>{{ $u->name }}</option>
                @endforeach
            </select>
        </div>
        <div style="margin-top:10px;">
            <label>Kamar</label>
            <select name="room_id" required>
                <option value="">Pilih Kamar</option>
                @foreach($rooms as $k)
                    <option value="{{ $k->id }}" @if($reservation->room_id == $k->id) selected @endif>{{ $k->nama }} ({{ $k->tipe }})</option>
                @endforeach
            </select>
        </div>
        <div style="margin-top:10px;">
            <label>Tanggal Mulai</label>
            <input type="date" name="tanggal_mulai" value="{{ $reservation->tanggal_mulai }}" required>
        </div>
        <div style="margin-top:10px;">
            <label>Tanggal Selesai</label>
            <input type="date" name="tanggal_selesai" value="{{ $reservation->tanggal_selesai }}" required>
        </div>
        <div style="margin-top:10px;">
            <label>Status</label>
            <select name="status" required>
                <option value="pending" @if($reservation->status=='pending') selected @endif>Pending</option>
                <option value="confirmed" @if($reservation->status=='confirmed') selected @endif>Confirmed</option>
                <option value="cancelled" @if($reservation->status=='cancelled') selected @endif>Cancelled</option>
            </select>
        </div>
        <div style="margin-top:18px;">
            <button type="submit" class="btn">Update</button>
            <a href="{{ route('reservasi.index') }}" class="btn" style="background:#aaa;">Batal</a>
        </div>
    </form>
</div>
@endsection 