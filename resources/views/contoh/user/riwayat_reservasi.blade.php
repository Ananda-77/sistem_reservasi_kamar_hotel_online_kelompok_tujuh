@extends('contoh.layout')

@section('content')
<div class="container mt-4">
    <h2>Riwayat Reservasi Saya</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>No</th>
                <th>Kamar</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Status</th>
                <th>Review</th>
            </tr>
        </thead>
        <tbody>
            @forelse($reservasi as $r)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $r->room->nama_kamar ?? '-' }}</td>
                <td>{{ $r->tanggal_mulai }}</td>
                <td>{{ $r->tanggal_selesai }}</td>
                <td>{{ ucfirst($r->status) }}</td>
                <td>
                    @if(in_array($r->status, ['confirmed', 'checked_out']) && !$r->review)
                        <a href="{{ route('reservasi.review.form', $r->id) }}" class="btn btn-sm btn-info">Beri Review</a>
                    @elseif($r->review)
                        <span class="badge bg-success">Sudah Direview</span>
                    @else
                        -
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Belum ada riwayat reservasi.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection 