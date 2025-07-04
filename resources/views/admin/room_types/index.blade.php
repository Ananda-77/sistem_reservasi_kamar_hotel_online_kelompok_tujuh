@extends('contoh.layout')
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-white px-3 py-2 mb-4 rounded shadow-sm">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.admin') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tipe Kamar</li>
    </ol>
</nav>
<h2 class="fw-bold mb-4" style="color:#6c4ee6;">Daftar Tipe Kamar</h2>
<a href="{{ route('room_types.create') }}" class="btn btn-success mb-3">+ Tambah Tipe Kamar</a>
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
<div class="row g-4">
    @forelse($roomTypes as $type)
    <div class="col-md-4">
        <div class="card h-100 shadow-sm">
            @if($type->gambar)
                <img src="{{ asset('storage/'.$type->gambar) }}" class="card-img-top" style="height:200px;object-fit:cover;" alt="{{ $type->nama }}">
            @else
                <div class="bg-light d-flex align-items-center justify-content-center" style="height:200px;">
                    <span class="text-secondary">Tidak ada gambar</span>
                </div>
            @endif
            <div class="card-body">
                <h5 class="card-title fw-bold">{{ $type->nama }}</h5>
                <p class="card-text">{{ $type->deskripsi }}</p>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12 text-center text-muted">Belum ada tipe kamar.</div>
    @endforelse
</div>
@endsection 