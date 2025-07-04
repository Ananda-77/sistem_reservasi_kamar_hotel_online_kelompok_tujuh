<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;

class AdminController extends Controller
{
    // Tampilkan halaman checkin: hanya reservasi dengan status 'pending'
    public function showCheckin()
    {
        $reservations = Reservation::with(['user', 'room'])
            ->where('status', 'pending')
            ->get();
        return view('admin.checkin', compact('reservations'));
    }

    // Tampilkan halaman checkout: hanya reservasi dengan status 'checked_in'
    public function showCheckout()
    {
        $reservations = Reservation::with(['user', 'room'])
            ->where('status', 'checked_in')
            ->get();
        return view('admin.checkout', compact('reservations'));
    }

    // Tampilkan halaman tamu in-house: hanya reservasi dengan status 'checked_in'
    public function showInhouse()
    {
        $reservations = Reservation::with(['user', 'room'])
            ->where('status', 'checked_in')
            ->get();
        return view('admin.inhouse', compact('reservations'));
    }

    public function checkin($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->status = 'checked_in';
        $reservation->save();
        return redirect()->back()->with('success', 'Check In berhasil untuk ID: ' . $id);
    }

    public function checkout($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->status = 'checked_out';
        $reservation->save();
        return redirect()->back()->with('success', 'Check Out berhasil untuk ID: ' . $id);
    }

    public function dashboardAdmin()
    {
        $totalUser = \App\Models\User::count();
        $totalKamar = \App\Models\Room::count();
        $totalReservasi = \App\Models\Reservation::count();
        return view('contoh.dashboard_admin', compact('totalUser', 'totalKamar', 'totalReservasi'));
    }

    // Laporan Transaksi Kamar
    public function laporanKamar()
    {
        $reservations = \App\Models\Reservation::with(['user', 'room'])->orderBy('created_at', 'desc')->get();
        return view('admin.laporan_kamar', compact('reservations'));
    }

    // Laporan Transaksi Layanan (dummy, bisa dikembangkan)
    public function laporanLayanan()
    {
        $data = [];
        return view('admin.laporan_layanan', compact('data'));
    }
} 