<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservasi Hotel Online</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html {
            scroll-behavior: smooth;
        }
        body {
            min-height: 100vh;
            background: #e3efff;
            font-family: 'Poppins', Arial, sans-serif;
        }
        .navbar {
            background: #fff;
            box-shadow: 0 2px 8px #0001;
        }
        .navbar-brand {
            font-weight: 700;
            color: #4f8cff !important;
            letter-spacing: 1px;
        }
        .nav-link {
            color: #333 !important;
            font-weight: 500;
            margin-right: 1.2rem;
            transition: color 0.2s;
            cursor: pointer;
        }
        .nav-link:hover {
            color: #4f8cff !important;
        }
        .hero-section {
            min-height: 80vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .hero-title, .hero-desc, .hero-btns, .hotel-img {
            opacity: 0;
            transform: translateY(40px);
            animation: fadeInUp 1s forwards;
        }
        .hero-title { animation-delay: 0.2s; }
        .hero-desc { animation-delay: 0.4s; }
        .hero-btns { animation-delay: 0.6s; }
        .hotel-img {
            animation: slideInRight 1.2s forwards;
            animation-delay: 0.7s;
            opacity: 0;
            transform: translateX(60px);
        }
        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        @keyframes slideInRight {
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        .btn-main {
            background: #4f8cff;
            color: #fff;
            font-weight: 600;
            border-radius: 10px;
            font-size: 1.1em;
            padding: 12px 32px;
            box-shadow: 0 2px 8px #4f8cff22;
            transition: background 0.2s, box-shadow 0.2s, transform 0.2s;
        }
        .btn-main:hover, .btn-main:focus {
            background: #1976d2;
            color: #fff;
            transform: scale(1.07);
            box-shadow: 0 4px 16px #4f8cff33;
        }
        .btn-outline-main {
            background:#fff;
            color:#4f8cff;
            border:2px solid #4f8cff;
        }
        .btn-outline-main:hover, .btn-outline-main:focus {
            background: #4f8cff;
            color: #fff;
        }
        .hotel-img {
            max-width: 100%;
            height: auto;
            border-radius: 18px;
            box-shadow: 0 4px 24px #4f8cff22;
        }
        /* Section Styles */
        section {
            padding: 80px 0 60px 0;
        }
        .section-title {
            font-size: 2rem;
            font-weight: 700;
            color: #1976d2;
            margin-bottom: 1.2em;
            text-align: center;
        }
        .service-card, .about-card, .contact-card {
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 2px 16px #4f8cff11;
            padding: 2.2rem 1.5rem;
            margin-bottom: 2rem;
            text-align: center;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .service-card:hover, .about-card:hover, .contact-card:hover {
            transform: translateY(-6px) scale(1.03);
            box-shadow: 0 6px 32px #4f8cff22;
        }
        .service-icon {
            font-size: 2.5rem;
            color: #4f8cff;
            margin-bottom: 1rem;
        }
        @media (max-width: 991px) {
            .hero-title { font-size: 2rem; }
            .hero-section { flex-direction: column; text-align: center; }
        }
        @keyframes fadeInLogo{from{opacity:0;transform:scale(0.8);}to{opacity:1;transform:scale(1);}}
    </style>
</head>
<body>
    <!-- Header/Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light py-3 fixed-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="#" style="animation:fadeInLogo 1s;">
                <span style="display:inline-flex;align-items:center;justify-content:center;background:#4f8cff;border-radius:50%;height:60px;width:60px;box-shadow:0 2px 12px #4f8cff55;">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height:44px;width:44px;object-fit:cover;border-radius:50%;filter:drop-shadow(0 2px 8px #fff8);">
                </span>
                <span class="fw-bold" style="color:#4f8cff;">Anovindra Luxury Escape</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="#hero">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#service">Service</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Hero Section -->
    <div class="hero-section position-relative d-flex align-items-center justify-content-center" id="hero" style="padding-top:90px; min-height:80vh;">
        <div class="hero-bg position-absolute top-0 start-0 w-100 h-100" style="z-index:1; background: url('{{ asset('images/image.png') }}') center center/cover no-repeat;"></div>
        <div class="hero-overlay position-absolute top-0 start-0 w-100 h-100" style="z-index:2; background: linear-gradient(120deg, rgba(44,62,80,0.55) 40%, rgba(79,140,255,0.35) 100%);"></div>
        <div class="container position-relative" style="z-index:3;">
            <div class="row align-items-center justify-content-center w-100">
                <div class="col-lg-7 mx-auto text-center">
                    <h1 class="hero-title text-white">Anovindra Luxury Escape</h1>
                    <p class="hero-desc text-white">Selamat datang di <b>Anovindra Luxury Escape</b>. Temukan kenyamanan dan kemewahan menginap di hotel terbaik pilihan Anda. Booking mudah, cepat, dan aman!</p>
                    <div class="hero-btns d-flex justify-content-center gap-3 flex-wrap">
                        <a href="{{ url('/login') }}" class="btn btn-main me-2">Login</a>
                        <a href="{{ url('/register') }}" class="btn btn-outline-main btn-main">Register</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service Section -->
    <section id="service">
        <div class="container">
            <h2 class="section-title">Service</h2>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="service-card">
                        <div class="service-icon">🏊‍♂️</div>
                        <h5 class="fw-bold">Infinity Pool</h5>
                        <p>Kolam renang modern dengan pemandangan laut yang memukau.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-card">
                        <div class="service-icon">🍽️</div>
                        <h5 class="fw-bold">Beachside Dining</h5>
                        <p>Restoran tepi pantai dengan menu seafood dan koktail tropis.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-card">
                        <div class="service-icon">🛏️</div>
                        <h5 class="fw-bold">Luxury Rooms</h5>
                        <p>Kamar hotel mewah, nyaman, dan fasilitas lengkap.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section -->
    <section id="about">
        <div class="container">
            <h2 class="section-title">About</h2>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="about-card">
                        <p><b>Anovindra Luxury Escape</b> adalah hotel berbintang yang berkomitmen memberikan pengalaman menginap terbaik untuk Anda. Dengan lokasi strategis, fasilitas lengkap, dan pelayanan ramah, kami siap menjadi pilihan utama Anda untuk liburan maupun perjalanan bisnis.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <h2 class="section-title">Contact</h2>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="contact-card">
                        <p>Hubungi kami untuk reservasi atau pertanyaan lebih lanjut:</p>
                        <ul class="list-unstyled mb-0">
                            <li><b>Email:</b> info@anovindraluxury.com</li>
                            <li><b>Telepon:</b> (021) 123-4567</li>
                            <li><b>Alamat:</b> Jl. Pantai Indah No. 1, Bali (Anovindra Luxury Escape)</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Navbar smooth scroll
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                if(href.startsWith('#')) {
                    e.preventDefault();
                    document.querySelector(href).scrollIntoView({ behavior: 'smooth' });
                }
            });
        });
    </script>
</body>
</html>
