<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Reservasi Hotel Online</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            background: url('{{ asset('images/gambar1.png') }}') center center/cover no-repeat;
            position: relative;
            font-family: 'Poppins', Arial, sans-serif;
        }
        .bg-overlay {
            position: fixed;
            top: 0; left: 0; width: 100vw; height: 100vh;
            background: linear-gradient(120deg, rgba(44,62,80,0.55) 40%, rgba(79,140,255,0.35) 100%);
            z-index: 1;
        }
        .register-card {
            max-width: 400px;
            margin: 60px auto;
            border-radius: 22px;
            box-shadow: 0 8px 32px #4fc3f744, 0 2px 12px #ffe08244;
            background: rgba(255,255,255,0.92);
            padding: 2.5rem 2rem 2rem 2rem;
            position: relative;
            z-index: 2;
            animation: fadeInUp 1s;
        }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(40px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .register-card h2 {
            font-weight: 700;
            color: #1976d2;
            text-align: center;
            margin-bottom: 8px;
        }
        .register-card p {
            text-align: center;
            color: #888;
            margin-bottom: 24px;
        }
        .form-label {
            font-weight: 600;
        }
        .input-group-text {
            background: #fffde7;
            border: none;
            color: #4f8cff;
            font-size: 1.2em;
        }
        .form-control {
            border-radius: 10px;
            font-size: 1.1em;
        }
        .btn-main {
            background: #4f8cff;
            color: #fff;
            font-weight: 700;
            border: none;
            border-radius: 10px;
            font-size: 1.1em;
            padding: 12px 0;
            box-shadow: 0 2px 8px #4f8cff22;
            transition: background 0.2s, box-shadow 0.2s, transform 0.2s;
        }
        .btn-main:hover {
            background: #1976d2;
            color: #fff;
            transform: scale(1.04);
        }
        @keyframes fadeInLogo{from{opacity:0;transform:scale(0.8);}to{opacity:1;transform:scale(1);}}
    </style>
</head>
<body>
    <div class="bg-overlay"></div>
    <div class="register-card">
        <div class="text-center mb-3" style="animation:fadeInLogo 1s;">
            <span style="display:inline-flex;align-items:center;justify-content:center;background:#4f8cff;border-radius:50%;height:90px;width:90px;box-shadow:0 2px 16px #4f8cff55;">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height:60px;width:60px;object-fit:cover;border-radius:50%;filter:drop-shadow(0 2px 8px #fff8);">
            </span>
        </div>
        <h2>Register</h2>
        <p>Buat akun <b>Anovindra Luxury Escape</b></p>
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <form method="POST" action="{{ url('/register') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                    <input type="text" id="name" name="name" required autofocus class="form-control">
                </div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                    <input type="email" id="email" name="email" required class="form-control">
                </div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                    <input type="password" id="password" name="password" required class="form-control">
                </div>
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                    <input type="password" id="password_confirmation" name="password_confirmation" required class="form-control">
                </div>
            </div>
            <div class="d-grid mt-4">
                <button type="submit" class="btn btn-main btn-lg">Register</button>
            </div>
        </form>
    </div>
</body>
</html> 