@extends('contoh.layout')
@section('content')
<div class="container-fluid">
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="mb-0" style="font-weight:600;">Daftar Kamar</h2>
                <a href="{{ route('kamar.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus me-1"></i>Tambah Kamar
                </a>
            </div>
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered align-middle">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Tipe</th>
                            <th>Harga</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($rooms as $k)
                        <tr>
                            <td>{{ $k->id }}</td>
                            <td>{{ $k->nama }}</td>
                            <td>{{ $k->roomType->nama ?? '-' }}</td>
                            <td>Rp {{ number_format($k->harga, 0, ',', '.') }}</td>
                            <td>
                                <span class="badge {{ $k->status == 'terisi' ? 'bg-danger' : 'bg-success' }}">
                                    {{ ucfirst($k->status) }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('kamar.edit', $k->id) }}" class="btn btn-info btn-sm me-1">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('kamar.destroy', $k->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin ingin menghapus kamar ini?')">
                                        <i class="fa fa-trash"></i> Hapus
                                    </button>
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
