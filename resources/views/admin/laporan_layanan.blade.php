@extends('contoh.layout')
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-white px-3 py-2 mb-4 rounded shadow-sm">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.admin') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Laporan Transaksi Layanan</li>
    </ol>
</nav>
<h2 class="fw-bold mb-4" style="color:#6c4ee6;">Laporan Transaksi Layanan</h2>
<div class="alert alert-info">Belum ada data transaksi layanan.</div>
@endsection 