<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Room;
use App\Models\Reservation;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('contoh.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $user = User::where('email', $credentials['email'])->first();
        if ($user && Hash::check($credentials['password'], $user->password)) {
            $request->session()->put('user', $user->id);
            $request->session()->put('role', $user->role);
            if ($user->role === 'admin') {
                return redirect('/dashboard-admin');
            } else {
                return redirect('/dashboard');
            }
        }
        return back()->with('error', 'Email atau password salah');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('user');
        return redirect('/login');
    }

    public function dashboard()
    {
        $jumlah_kamar = Room::count();
        $jumlah_kamar_tersedia = Room::where('status', 'tersedia')->count();
        $jumlah_kamar_terisi = Room::where('status', 'terisi')->count();
        $jumlah_reservasi = Reservation::count();
        $jumlah_booking_aktif = Reservation::where('status', 'confirmed')->count();
        return view('contoh.dashboard', compact('jumlah_kamar', 'jumlah_kamar_tersedia', 'jumlah_kamar_terisi', 'jumlah_reservasi', 'jumlah_booking_aktif'));
    }
} 