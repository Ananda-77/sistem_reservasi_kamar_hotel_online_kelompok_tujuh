<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservasi Hotel Online</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            background: #f4f6fb;
            font-family: 'Poppins', Arial, sans-serif;
            transition: background 0.3s, color 0.3s;
        }
        body.dark-mode {
            background: #1a1d2b;
            color: #e2e8f0;
        }
        body.dark-mode .sidebar {
            background: linear-gradient(135deg, #4f8cff 0%, #6c4ee6 60%, #7b5fff 100%);
            color: #fff;
            box-shadow: 4px 0 32px #4f8cff33, 0 2px 12px #6c4ee644;
            border-right: 2px solid #7b5fff44;
        }
        body.dark-mode .sidebar a,
        body.dark-mode .sidebar .logout-btn {
            color: #fff;
            text-shadow: 0 1px 8px #23263a99;
        }
        body.dark-mode .sidebar a.active,
        body.dark-mode .sidebar a:hover,
        body.dark-mode .sidebar .logout-btn:hover {
            background: rgba(255,255,255,0.08);
            color: #ffd700;
            box-shadow: 0 2px 12px #ffd70033;
        }
        body.dark-mode .main-content {
            background: linear-gradient(120deg, #23263a 60%, #252a40 100%);
            color: #e2e8f0;
            padding-left: 0 !important;
        }
        body.dark-mode .row.g-4 {
            margin-left: 0 !important;
            padding-left: 0 !important;
        }
        body.dark-mode .card,
        body.dark-mode table {
            background: rgba(44,54,80,0.85) !important;
            color: #e2e8f0;
            box-shadow: 0 4px 24px #0008, 0 1.5px 8px #4f8cff44;
            border: 1.5px solid #4f8cff33;
            backdrop-filter: blur(4px);
        }
        body.dark-mode th {
            background: #4f8cff !important;
            color: #ffd700 !important;
            border-bottom: 2px solid #7b5fff;
        }
        body.dark-mode .breadcrumb {
            background: rgba(44,54,80,0.85) !important;
            color: #ffd700 !important;
            border: 1.5px solid #4f8cff33;
        }
        body.dark-mode .btn,
        body.dark-mode button.btn {
            background: linear-gradient(90deg, #4f8cff 70%, #6c4ee6 100%);
            color: #fff;
            border: none;
            box-shadow: 0 2px 8px #4f8cff44;
        }
        body.dark-mode .btn-info {
            background: #23263a;
            color: #ffd700;
            border: 1.5px solid #ffd700;
        }
        body.dark-mode .btn-info:hover {
            background: #4f8cff;
            color: #fff;
        }
        body.dark-mode .alert {
            background: #23263a;
            color: #ffd700;
            border-color: #ffd700;
            box-shadow: 0 2px 12px #ffd70033;
        }
        body.dark-mode input,
        body.dark-mode select,
        body.dark-mode textarea {
            background: rgba(44,54,80,0.85);
            color: #ffd700;
            border: 1.5px solid #4f8cff;
            box-shadow: 0 1px 8px #4f8cff33;
        }
        body.dark-mode input:focus,
        body.dark-mode select:focus,
        body.dark-mode textarea:focus {
            border-color: #ffd700;
            box-shadow: 0 0 0 2px #ffd70044;
        }
        body.dark-mode .chat-bubble.user {
            background: linear-gradient(90deg, #4f8cff 80%, #7b5fff 100%);
            color: #ffd700;
            box-shadow: 0 2px 12px #4f8cff44;
        }
        body.dark-mode .chat-bubble.admin {
            background: rgba(44,54,80,0.85);
            color: #ffd700;
            border: 1.5px solid #4f8cff;
            box-shadow: 0 2px 12px #4f8cff44;
        }
        /* Tambahan transisi dan efek modern */
        .sidebar, .main-content, .card, table, th, .breadcrumb, .btn, .alert, input, select, textarea {
            transition: background 0.3s, color 0.3s, box-shadow 0.3s, border 0.3s;
        }
        .sidebar .brand {
            font-family: 'Montserrat', Arial, sans-serif;
            font-size: 1.5em;
            font-weight: 700;
            letter-spacing: 1px;
            text-align: left;
            margin-left: 28px;
            margin-bottom: 32px;
        }
        .sidebar .profile {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 30px;
        }
        .sidebar .avatar {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            background: #fff;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2em;
            color: #6c4ee6;
            object-fit: cover;
            border: 2px solid #fff;
            box-shadow: 0 2px 8px #aaa;
        }
        .sidebar .profile-name {
            font-weight: 700;
            font-size: 1.1em;
            font-family: 'Montserrat', Arial, sans-serif;
            letter-spacing: 1px;
        }
        .sidebar a, .sidebar .logout-btn {
            display: flex;
            align-items: center;
            color: #fff;
            padding: 13px 24px;
            text-decoration: none;
            border-radius: 8px;
            margin: 0 12px 8px 12px;
            font-size: 1.08em;
            transition: background 0.2s, color 0.2s, box-shadow 0.2s, transform 0.2s;
            gap: 12px;
            font-weight: 500;
        }
        .sidebar a.active, .sidebar a:hover, .sidebar .logout-btn:hover {
            background: #fff;
            color: #6c4ee6;
            box-shadow: 0 2px 8px #6c4ee644;
            transform: translateY(-2px) scale(1.03);
        }
        .sidebar .icon {
            width: 22px;
            text-align: center;
            font-size: 1.1em;
        }
        .sidebar .logout-btn {
            background: none;
            border: none;
            cursor: pointer;
            width: 100%;
            text-align: left;
            font-size: 1.08em;
        }
        .sidebar .logout-btn:active {
            background: #dc3545;
        }
        .topbar {
            width: 100%;
            background: #fff;
            min-height: 60px;
            box-shadow: 0 2px 8px #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            padding: 0 32px;
            border-top-left-radius: 18px;
            border-bottom-left-radius: 18px;
            margin-bottom: 32px;
        }
        .topbar .topbar-icons {
            display: flex;
            align-items: center;
            gap: 18px;
        }
        .topbar .profile-pic {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #6c4ee6;
        }
        .main-content {
            flex: 1;
            padding: 40px 30px 30px 30px;
            min-height: 100vh;
            background: #f4f6fb;
        }
        .card {
            border-radius: 14px !important;
            box-shadow: 0 4px 24px #b6e0e033, 0 1.5px 8px #e2e8f0;
            transition: box-shadow 0.2s, transform 0.2s;
        }
        .card:hover {
            box-shadow: 0 8px 32px #6c4ee644, 0 2px 12px #e2e8f0;
            transform: translateY(-4px) scale(1.03);
        }
        .btn, button.btn {
            border-radius: 8px;
            font-weight: 600;
            font-family: 'Poppins', Arial, sans-serif;
            letter-spacing: 0.5px;
            box-shadow: 0 2px 8px #6c4ee622;
            transition: background 0.2s, box-shadow 0.2s, transform 0.2s;
        }
        .btn-primary {
            background: #22c55e;
            border: none;
        }
        .btn-primary:hover {
            background: #16a34a;
            box-shadow: 0 4px 16px #22c55e44;
            transform: scale(1.04);
        }
        .btn-danger {
            background: #dc3545;
            border: none;
        }
        .btn-danger:hover {
            background: #b71c1c;
        }
        .btn-info {
            background: #6c4ee6;
            color: #fff;
            border: none;
        }
        .btn-info:hover {
            background: #4f3bbd;
            color: #fff;
        }
        /* Tabel modern */
        table {
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 12px #e2e8f0;
        }
        th {
            background: #6c4ee6;
            color: #fff;
            font-weight: 700;
            font-size: 1.1em;
            position: sticky;
            top: 0;
            z-index: 2;
        }
        td, th {
            vertical-align: middle !important;
        }
        tr:nth-child(even) td {
            background: #f8fafc;
        }
        .badge {
            font-size: 1em;
            border-radius: 8px;
            padding: 0.5em 1em;
            font-weight: 600;
        }
        .badge.bg-success { background: #22c55e !important; color: #fff; }
        .badge.bg-danger { background: #dc3545 !important; color: #fff; }
        .badge.bg-warning { background: #facc15 !important; color: #333; }
        .badge.bg-secondary { background: #64748b !important; color: #fff; }
        label {
            font-weight: 600;
            margin-bottom: 4px;
        }
        input[type="text"], input[type="email"], input[type="password"], select, textarea {
            border-radius: 8px;
            border: 1.5px solid #cbd5e1;
            padding: 10px 14px;
            font-size: 1em;
            margin-bottom: 10px;
            box-shadow: 0 1px 4px #e2e8f0;
            background: #f8fafc;
        }
        input:focus, select:focus, textarea:focus {
            border-color: #6c4ee6;
            outline: none;
            box-shadow: 0 0 0 2px #6c4ee633;
        }
        @media (max-width: 900px) {
            .sidebar { width: 70px; padding-top: 10px; }
            .sidebar .brand { display: none; }
            .sidebar a, .sidebar .logout-btn { font-size: 0.95em; padding: 10px 10px; justify-content: center; }
            .sidebar a span:not(.icon), .sidebar .logout-btn span:not(.icon), .sidebar .profile-name { display: none; }
            .main-content { padding: 15px; }
            .sidebar .avatar { width: 38px; height: 38px; font-size: 1.2em; }
        }
        .wrapper {
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            width: 240px;
            min-width: 240px;
            max-width: 240px;
            background: #6c4ee6;
            color: #fff;
            min-height: 100vh;
            position: sticky;
            top: 0;
            left: 0;
            display: flex;
            flex-direction: column;
            padding-top: 24px;
            box-shadow: 2px 0 18px rgba(44,62,80,0.10);
            z-index: 10;
        }
        .main-content {
            flex: 1 1 0%;
            padding: 40px 30px 30px 30px;
            min-height: 100vh;
            background: #f4f6fb;
            z-index: 1;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="sidebar">
            <div class="profile mb-4 d-flex flex-column align-items-center">
                @php $sidebarUser = \App\Models\User::find(session('user')); @endphp
                @if($sidebarUser && $sidebarUser->photo)
                    <img src="{{ asset('storage/' . $sidebarUser->photo) }}" alt="Foto Profil" class="avatar mb-2">
                @else
                    <span class="avatar mb-2 d-flex align-items-center justify-content-center bg-light"><i class="fa fa-user text-secondary"></i></span>
                @endif
                <span class="profile-name">{{ $sidebarUser->name ?? '' }}</span>
            </div>
            <ul class="nav flex-column">
                @php $role = session('role'); @endphp
                @if($role === 'admin')
                    <li class="nav-item mb-1">
                        <a class="nav-link active" href="{{ route('dashboard.admin') }}"><i class="fa fa-home icon"></i> Dashboard</a>
                    </li>
                    <li class="nav-item mb-1">
                        <a class="nav-link" data-bs-toggle="collapse" href="#collapseCheckin" role="button" aria-expanded="false" aria-controls="collapseCheckin">
                            <i class="fa fa-calendar-check icon"></i> Check In / Out <i class="fa fa-chevron-down ms-auto"></i>
                        </a>
                        <div class="collapse" id="collapseCheckin">
                            <ul class="nav flex-column ms-3">
                                <li><a class="nav-link" href="{{ route('admin.checkin') }}"><i class="fa fa-sign-in-alt icon"></i> Check In</a></li>
                                <li><a class="nav-link" href="{{ route('admin.checkout') }}"><i class="fa fa-sign-out-alt icon"></i> Check Out</a></li>
                                <li><a class="nav-link" href="{{ route('reservasi.index') }}">Reservasi / Booking</a></li>
                                <li><a class="nav-link" href="{{ route('admin.inhouse') }}">Tamu In-House</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item mb-1">
                        <a class="nav-link" data-bs-toggle="collapse" href="#collapseKamar" role="button" aria-expanded="false" aria-controls="collapseKamar">
                            <i class="fa fa-bed icon"></i> Kamar <i class="fa fa-chevron-down ms-auto"></i>
                        </a>
                        <div class="collapse" id="collapseKamar">
                            <ul class="nav flex-column ms-3">
                                <li><a class="nav-link" href="{{ route('kamar.index') }}">Lihat Kamar</a></li>
                                <li><a class="nav-link" href="{{ route('kamar.create') }}">Tambah Kamar</a></li>
                                <li><a class="nav-link" href="{{ route('room_types.index') }}">Tipe Kamar</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item mb-1">
                        <a class="nav-link" href="{{ route('user.index') }}"><i class="fa fa-users icon"></i> User Manager</a>
                    </li>
                    <li class="nav-item mb-1">
                        <a class="nav-link" href="{{ route('chat.admin.list') }}"><i class="fa fa-comments icon"></i> Chat User</a>
                    </li>
                    <li class="nav-item mb-1">
                        <a class="nav-link" data-bs-toggle="collapse" href="#collapseLaporan" role="button" aria-expanded="false" aria-controls="collapseLaporan">
                            <i class="fa fa-file-alt icon"></i> Laporan <i class="fa fa-chevron-down ms-auto"></i>
                        </a>
                        <div class="collapse" id="collapseLaporan">
                            <ul class="nav flex-column ms-3">
                                <li><a class="nav-link" href="{{ route('laporan.kamar') }}">Transaksi Kamar</a></li>
                                <li><a class="nav-link" href="{{ route('laporan.layanan') }}">Transaksi Layanan</a></li>
                            </ul>
                        </div>
                    </li>
                @elseif($role === 'user')
                    <li class="nav-item mb-1">
                        <a class="nav-link active" href="{{ route('dashboard') }}"><i class="fa fa-home icon"></i> Dashboard</a>
                    </li>
                    <li class="nav-item mb-1">
                        <a class="nav-link" href="{{ route('reservasi.index') }}"><i class="fa fa-calendar-check icon"></i> Reservasi / Booking</a>
                    </li>
                    <li class="nav-item mb-1">
                        <a class="nav-link" href="{{ route('user.riwayat_reservasi') }}"><i class="fa fa-history icon"></i> Riwayat Reservasi</a>
                    </li>
                    <li class="nav-item mb-1">
                        <a class="nav-link" href="{{ route('chat.index') }}"><i class="fa fa-comments icon"></i> Chat Admin</a>
                    </li>
                @endif
                <li class="nav-item mb-1">
                    <a class="nav-link" href="{{ route('profil') }}"><i class="fa fa-user icon"></i> Profil Saya</a>
                </li>
                <li class="nav-item mt-3">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="logout-btn"><i class="fa fa-sign-out-alt icon"></i> Log Out</button>
                    </form>
                </li>
            </ul>
        </div>
        <div style="flex:1;display:flex;flex-direction:column;min-height:100vh;">
            <div class="topbar d-flex align-items-center">
                <div class="d-flex align-items-center gap-2 me-auto">
                    <span style="display:inline-flex;align-items:center;justify-content:center;background:#4f8cff;border-radius:50%;height:38px;width:38px;box-shadow:0 2px 12px #4f8cff55;">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height:28px;width:28px;object-fit:cover;border-radius:50%;filter:drop-shadow(0 2px 8px #fff8);">
                    </span>
                    <span class="fw-bold" style="color:#6c4ee6;font-size:1.2em;letter-spacing:1px;">Anovindra Luxury Escape</span>
                </div>
                <div class="topbar-icons">
                    <a href="{{ route('profil') }}" class="text-secondary" style="font-size:1.3em;"><i class="fa fa-cog"></i></a>
                    <button id="toggleMode" class="btn btn-sm btn-light" style="border-radius:50%;width:38px;height:38px;display:flex;align-items:center;justify-content:center;box-shadow:none;border:none;outline:none;" title="Ganti Mode">
                        <i id="modeIcon" class="fa fa-moon"></i>
                    </button>
                    @php
                        $sidebarUser = \App\Models\User::find(session('user'));
                    @endphp
                    @if($sidebarUser && $sidebarUser->photo)
                        <img src="{{ asset('storage/' . $sidebarUser->photo) }}" alt="Foto Profil" class="profile-pic">
                    @else
                        <span class="profile-pic d-flex align-items-center justify-content-center bg-light"><i class="fa fa-user text-secondary"></i></span>
                    @endif
                </div>
            </div>
            <div class="main-content">
                @yield('content')
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle dark/light mode
        function setMode(mode) {
            if(mode === 'dark') {
                document.body.classList.add('dark-mode');
                localStorage.setItem('mode', 'dark');
                document.getElementById('modeIcon').className = 'fa fa-sun';
            } else {
                document.body.classList.remove('dark-mode');
                localStorage.setItem('mode', 'light');
                document.getElementById('modeIcon').className = 'fa fa-moon';
            }
        }
        document.getElementById('toggleMode').onclick = function() {
            if(document.body.classList.contains('dark-mode')) {
                setMode('light');
            } else {
                setMode('dark');
            }
        };
        // Set mode on load
        window.onload = function() {
            var mode = localStorage.getItem('mode') || 'light';
            setMode(mode);
        };
    </script>
</body>
</html> 