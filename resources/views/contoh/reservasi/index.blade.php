@extends('contoh.layout')
@section('content')
<div class="container-fluid">
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="mb-0" style="font-weight:600;">Daftar Reservasi</h2>
                <a href="{{ route('reservasi.create') }}" class="btn btn-primary"><i class="fa fa-plus me-1"></i>Tambah Reservasi</a>
            </div>
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered align-middle">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>User</th>
                            <th>Kamar</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($reservations as $r)
                        <tr>
                            <td>{{ $r->id }}</td>
                            <td>{{ $r->user->name ?? '-' }}</td>
                            <td>{{ $r->room->nama ?? '-' }}</td>
                            <td>{{ $r->tanggal_mulai }}</td>
                            <td>{{ $r->tanggal_selesai }}</td>
                            <td><span class="badge {{ $r->status == 'selesai' ? 'bg-success' : ($r->status == 'batal' ? 'bg-danger' : 'bg-warning text-dark') }}">{{ ucfirst($r->status) }}</span></td>
                            <td>
                                <a href="{{ route('reservasi.edit', $r->id) }}" class="btn btn-info btn-sm me-1"><i class="fa fa-edit"></i> Edit</a>
                                <form action="{{ route('reservasi.destroy', $r->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus reservasi ini?')"><i class="fa fa-trash"></i> Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection 