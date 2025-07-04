@extends('contoh.layout')

@section('content')
<div class="container mt-4">
    <h2>Beri Review untuk Kamar: <b>{{ $reservation->room->nama_kamar ?? '-' }}</b></h2>
    @if(isset($success))
        <div class="alert alert-success">{{ $success }}</div>
    @endif
    <form action="{{ route('reservasi.review.simpan', $reservation->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="rating" class="form-label">Rating (1-5)</label>
            <select name="rating" id="rating" class="form-control" required>
                <option value="">Pilih rating</option>
                @for($i=1; $i<=5; $i++)
                    <option value="{{ $i }}">{{ $i }} Bintang</option>
                @endfor
            </select>
        </div>
        <div class="mb-3">
            <label for="komentar" class="form-label">Komentar (opsional)</label>
            <textarea name="komentar" id="komentar" class="form-control" rows="4" placeholder="Tulis komentar Anda..."></textarea>
        </div>
        <button type="submit" class="btn btn-success">Kirim Review</button>
        <a href="{{ route('user.riwayat_reservasi') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection 