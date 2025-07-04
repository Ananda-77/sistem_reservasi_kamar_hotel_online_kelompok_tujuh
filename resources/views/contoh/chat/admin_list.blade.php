@extends('contoh.layout')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Daftar User yang Pernah Chat</h2>
    <div class="card p-3">
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama User</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $u)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $u->name }}</td>
                    <td>{{ $u->email }}</td>
                    <td>
                        <a href="{{ route('chat.admin.chat', $u->id) }}" class="btn btn-info btn-sm">
                            <i class="fa fa-comments"></i> Buka Chat
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">Belum ada user yang chat.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection 