@extends('contoh.layout')
@section('content')
<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white px-3 py-2 mb-4 rounded shadow-sm">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.admin') }}">Dashboard Admin</a></li>
            <li class="breadcrumb-item active" aria-current="page">Kelola User/Admin</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="fw-bold mb-0" style="color:#6c4ee6;">Kelola User/Admin</h2>
        <a href="{{ route('user.create') }}" class="btn btn-success"><i class="fa fa-plus me-1"></i>Tambah User</a>
    </div>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered align-middle">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $u)
                        <tr>
                            <td>{{ $u->id }}</td>
                            <td>{{ $u->name }}</td>
                            <td>{{ $u->email }}</td>
                            <td>
                                <span class="badge {{ $u->role == 'admin' ? 'bg-primary' : 'bg-secondary' }}">{{ ucfirst($u->role) }}</span>
                            </td>
                            <td>
                                <a href="{{ route('user.edit', $u->id) }}" class="btn btn-info btn-sm me-1"><i class="fa fa-edit"></i> Edit</a>
                                <form action="{{ route('user.destroy', $u->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus user ini?')"><i class="fa fa-trash"></i> Hapus</button>
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