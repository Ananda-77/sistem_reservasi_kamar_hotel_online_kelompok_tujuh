<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;

class UserController extends Controller
{
    // Tampilkan daftar user/admin
    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();
        return view('contoh.user.index', compact('users'));
    }

    // Tampilkan form tambah user
    public function create()
    {
        return view('contoh.user.create');
    }

    // Simpan user baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->save();
        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan!');
    }

    // Tampilkan form edit user
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('contoh.user.edit', compact('user'));
    }

    // Update user
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required',
        ]);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->save();
        return redirect()->route('user.index')->with('success', 'User berhasil diupdate!');
    }

    // Hapus user
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User berhasil dihapus!');
    }

    // Tampilkan riwayat reservasi user yang sedang login
    public function riwayatReservasi()
    {
        $userId = session('user');
        $user = User::find($userId);
        if (!$user) {
            return redirect('/login');
        }
        $reservasi = $user->reservations()->with('room')->orderBy('tanggal_mulai', 'desc')->get();
        return view('contoh.user.riwayat_reservasi', compact('reservasi'));
    }
} 