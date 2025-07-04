@extends('contoh.layout')
@section('content')
<div class="main-content" style="max-width: 500px; margin: 0 auto;">
    <h2>Profil Saya</h2>
    @if(session('success'))
        <div style="color: green; margin-bottom: 10px;">{{ session('success') }}</div>
    @endif
    <form method="POST" action="{{ route('profil.update') }}" enctype="multipart/form-data">
        @csrf
        <div style="text-align:center; margin-bottom:20px;">
            @if($user->photo)
                <img src="{{ asset('storage/' . $user->photo) }}" alt="Foto Profil" style="width:100px; height:100px; border-radius:50%; object-fit:cover; box-shadow:0 2px 8px #aaa;">
            @else
                <div class="avatar" style="width:100px; height:100px; border-radius:50%; background:#e6fffa; display:flex; align-items:center; justify-content:center; font-size:2.5em; color:#4fd1c5; margin:0 auto; box-shadow:0 2px 8px #aaa;">
                    <i class="fa fa-user"></i>
                </div>
            @endif
        </div>
        <div>
            <label>Nama</label>
            <input type="text" name="name" value="{{ $user->name }}" required>
        </div>
        <div style="margin-top:10px;">
            <label>Email</label>
            <input type="email" name="email" value="{{ $user->email }}" required>
        </div>
        <div style="margin-top:10px;">
            <label>Foto Profil</label>
            <input type="file" name="photo" accept="image/*">
        </div>
        <div style="margin-top:18px;">
            <button type="submit" class="btn">Update Profil</button>
        </div>
    </form>
</div>
@endsection 