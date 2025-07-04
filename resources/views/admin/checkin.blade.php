@extends('contoh.layout')
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-white px-3 py-2 mb-4 rounded shadow-sm">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.admin') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Check In</li>
    </ol>
</nav>
<h2 class="fw-bold mb-4" style="color:#6c4ee6;">Daftar Reservasi Siap Check In</h2>
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
<div class="card">
    <div class="card-body">
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Tamu</th>
                    <th>Kamar</th>
                    <th>Tanggal Check In</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($reservations as $i => $r)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $r->user->name ?? '-' }}</td>
                    <td>{{ $r->room->nama ?? '-' }}</td>
                    <td>{{ $r->tanggal_mulai }}</td>
                    <td><span class="badge bg-warning">Belum Check In</span></td>
                    <td>
                        <form method="POST" action="{{ route('admin.checkin.aksi', $r->id) }}">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">Check In</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="text-center">Tidak ada reservasi siap check in.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection 