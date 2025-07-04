@extends('contoh.layout')
@section('content')
<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white px-3 py-2 mb-4 rounded shadow-sm">
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </nav>
    <h2 class="fw-bold mb-4" style="color:#6c4ee6;">Selamat datang di Dashboard!</h2>
    <div class="row g-4">
        <div class="col-md-4 col-lg-3">
            <div class="card text-center">
                <div class="card-body">
                    <div class="mb-2"><i class="fa fa-bed fa-2x text-info"></i></div>
                    <div class="fw-semibold">Total Kamar</div>
                    <div class="display-6 fw-bold" id="statKamar">{{ $jumlah_kamar ?? 0 }}</div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-3">
            <div class="card text-center">
                <div class="card-body">
                    <div class="mb-2"><i class="fa fa-door-open fa-2x text-success"></i></div>
                    <div class="fw-semibold">Kamar Tersedia</div>
                    <div class="display-6 fw-bold" id="statTersedia">{{ $jumlah_kamar_tersedia ?? 0 }}</div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-3">
            <div class="card text-center">
                <div class="card-body">
                    <div class="mb-2"><i class="fa fa-user-check fa-2x text-warning"></i></div>
                    <div class="fw-semibold">Kamar Terisi</div>
                    <div class="display-6 fw-bold" id="statTerisi">{{ $jumlah_kamar_terisi ?? 0 }}</div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-3">
            <div class="card text-center">
                <div class="card-body">
                    <div class="mb-2"><i class="fa fa-calendar-check fa-2x text-primary"></i></div>
                    <div class="fw-semibold">Total Reservasi</div>
                    <div class="display-6 fw-bold" id="statReservasi">{{ $jumlah_reservasi ?? 0 }}</div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-3">
            <div class="card text-center">
                <div class="card-body">
                    <div class="mb-2"><i class="fa fa-book fa-2x text-secondary"></i></div>
                    <div class="fw-semibold">Booking Aktif</div>
                    <div class="display-6 fw-bold" id="statBooking">{{ $jumlah_booking_aktif ?? 0 }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
// Animasi angka naik pada statistik
function animateValue(id, end, duration = 900) {
    const el = document.getElementById(id);
    if (!el) return;
    const start = 0;
    const range = end - start;
    let startTime = null;
    function animate(currentTime) {
        if (!startTime) startTime = currentTime;
        const progress = Math.min((currentTime - startTime) / duration, 1);
        el.textContent = Math.floor(progress * range + start);
        if (progress < 1) requestAnimationFrame(animate);
        else el.textContent = end;
    }
    requestAnimationFrame(animate);
}
animateValue('statKamar', {{ $jumlah_kamar ?? 0 }});
animateValue('statTersedia', {{ $jumlah_kamar_tersedia ?? 0 }});
animateValue('statTerisi', {{ $jumlah_kamar_terisi ?? 0 }});
animateValue('statReservasi', {{ $jumlah_reservasi ?? 0 }});
animateValue('statBooking', {{ $jumlah_booking_aktif ?? 0 }});
</script>
@endsection 
 