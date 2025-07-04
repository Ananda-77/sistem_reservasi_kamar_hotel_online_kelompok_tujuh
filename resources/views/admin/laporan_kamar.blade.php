@extends('contoh.layout')
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-white px-3 py-2 mb-4 rounded shadow-sm">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.admin') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Laporan Transaksi Kamar</li>
    </ol>
</nav>
<h2 class="fw-bold mb-4" style="color:#6c4ee6;">Laporan Transaksi Kamar</h2>
<div class="card">
    <div class="card-body">
        <table class="table table-striped table-hover align-middle">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama User</th>
                    <th>Kamar</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($reservations as $i => $r)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $r->user->name ?? '-' }}</td>
                    <td>{{ $r->room->nama ?? '-' }}</td>
                    <td>{{ $r->tanggal_mulai }}</td>
                    <td>{{ $r->tanggal_selesai }}</td>
                    <td><span class="badge bg-info">{{ ucfirst($r->status) }}</span></td>
                </tr>
                @empty
                <tr><td colspan="6" class="text-center">Tidak ada data reservasi.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection 