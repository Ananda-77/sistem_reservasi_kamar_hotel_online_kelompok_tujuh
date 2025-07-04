@extends('contoh.layout')
@section('content')
<style>
    .main-content {
        padding-left: 0 !important;
    }
    .row.g-4 {
        margin-left: 0 !important;
        padding-left: 0 !important;
    }
    .dashboard-card {
        margin-left: 0 !important;
        border-radius: 18px !important;
        box-shadow: 0 4px 24px #b6e0e033, 0 1.5px 8px #e2e8f0;
        transition: box-shadow 0.2s, transform 0.2s;
        background: linear-gradient(120deg, #f4f6fb 60%, #e0e7ff 100%);
        border: none;
        position: relative;
        overflow: hidden;
    }
    .dashboard-card:hover {
        box-shadow: 0 8px 32px #6c4ee644, 0 2px 12px #e2e8f0;
        transform: translateY(-4px) scale(1.03);
    }
    .dashboard-icon {
        font-size: 2.8em;
        margin-bottom: 10px;
        background: linear-gradient(90deg, #6c4ee6 70%, #4f8cff 100%);
        color: #fff;
        border-radius: 50%;
        width: 64px;
        height: 64px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 2px 12px #6c4ee644;
        margin-left: auto;
        margin-right: auto;
    }
    .dashboard-title {
        font-weight: 700;
        font-size: 1.1em;
        color: #4f3bbd;
        letter-spacing: 0.5px;
    }
    .dashboard-value {
        font-size: 2.2em;
        font-weight: 800;
        color: #222;
        margin-top: 6px;
        margin-bottom: 0;
        letter-spacing: 1px;
    }
    body.dark-mode .row.g-4 {
        justify-content: flex-start !important;
        text-align: left !important;
    }
    body.dark-mode .dashboard-card {
        margin-left: 0 !important;
        margin-right: 24px !important;
    }
    body.dark-mode .dashboard-card:first-child {
        margin-left: 0 !important;
    }
</style>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-white px-3 py-2 mb-4 rounded shadow-sm">
        <li class="breadcrumb-item active" aria-current="page">Dashboard Admin</li>
    </ol>
</nav>
<h2 class="fw-bold mb-4" style="color:#6c4ee6;">Selamat datang di Dashboard Admin!</h2>
<div class="row g-4">
    <div class="col-md-4 col-lg-3">
        <div class="card dashboard-card text-center">
            <div class="card-body">
                <div class="dashboard-icon"><i class="fa fa-users"></i></div>
                <div class="dashboard-title">Total User</div>
                <div class="dashboard-value">{{ $totalUser ?? 0 }}</div>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-lg-3">
        <div class="card dashboard-card text-center">
            <div class="card-body">
                <div class="dashboard-icon" style="background:linear-gradient(90deg,#4f8cff 70%,#6c4ee6 100%);"><i class="fa fa-bed"></i></div>
                <div class="dashboard-title">Total Kamar</div>
                <div class="dashboard-value">{{ $totalKamar ?? 0 }}</div>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-lg-3">
        <div class="card dashboard-card text-center">
            <div class="card-body">
                <div class="dashboard-icon" style="background:linear-gradient(90deg,#22c55e 70%,#4f8cff 100%);"><i class="fa fa-calendar-check"></i></div>
                <div class="dashboard-title">Total Reservasi</div>
                <div class="dashboard-value">{{ $totalReservasi ?? 0 }}</div>
            </div>
        </div>
    </div>
</div>
@endsection 