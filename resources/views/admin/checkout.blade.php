@extends('contoh.layout')
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-white px-3 py-2 mb-4 rounded shadow-sm">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.admin') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Check Out</li>
    </ol>
</nav>
<h2 class="fw-bold mb-4" style="color:#6c4ee6;">Daftar Tamu In-House (Siap Check Out)</h2>
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
                    <th>Tanggal Check Out</th>
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
                    <td>{{ $r->tanggal_selesai }}</td>
                    <td><span class="badge bg-success">In-House</span></td>
                    <td>
                        <form method="POST" action="{{ route('admin.checkout.aksi', $r->id) }}" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Check Out</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="7" class="text-center">Tidak ada tamu in-house siap check out.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection 