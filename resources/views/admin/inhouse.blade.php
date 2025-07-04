@extends('contoh.layout')
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-white px-3 py-2 mb-4 rounded shadow-sm">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.admin') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tamu In-House</li>
    </ol>
</nav>
<h2 class="fw-bold mb-4" style="color:#6c4ee6;">Daftar Tamu In-House</h2>
<div class="card">
    <div class="card-body">
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Tamu</th>
                    <th>Kamar</th>
                    <th>Tanggal Check In</th>
                    <th>Tanggal Check Out</th>
                    <th>Status</th>
                    <th>Layanan Kamar</th>
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
                    <td><span class="badge bg-success">In-House</span></td>
                    <td>
                        <a href="#" class="btn btn-info btn-sm">Layanan Kamar</a>
                    </td>
                </tr>
                @empty
                <tr><td colspan="7" class="text-center">Tidak ada tamu in-house.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection 