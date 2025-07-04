<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\User;
use App\Models\Review;

class ReservationController extends Controller
{
    public function index()
    {
        if (session('role') === 'admin') {
            $reservations = Reservation::with(['room', 'user'])->latest()->get();
        } else {
            $reservations = Reservation::with(['room', 'user'])->where('user_id', session('user'))->latest()->get();
        }
        return view('contoh.reservasi.index', compact('reservations'));
    }

    public function create()
    {
        if (session('role') === 'admin') {
            $rooms = Room::all();
            $users = User::all();
        } else {
            $rooms = Room::where('status', 'tersedia')->get();
            $users = User::where('id', session('user'))->get();
        }
        return view('contoh.reservasi.create', compact('rooms', 'users'));
    }

    public function store(Request $request)
    {
        if (session('role') !== 'admin') {
            $request->merge(['user_id' => session('user')]);
        }
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'room_id' => 'required|exists:rooms,id',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'status' => 'required|in:pending,confirmed,cancelled',
        ]);
        Reservation::create($request->all());
        Room::where('id', $request->room_id)->update(['status' => 'terisi']);
        return redirect()->route('reservasi.index')->with('success', 'Reservasi berhasil ditambahkan');
    }

    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);
        if (session('role') !== 'admin' && $reservation->user_id != session('user')) {
            abort(403);
        }
        $rooms = Room::all();
        $users = User::all();
        return view('contoh.reservasi.edit', compact('reservation', 'rooms', 'users'));
    }

    public function update(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);
        if (session('role') !== 'admin' && $reservation->user_id != session('user')) {
            abort(403);
        }
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'room_id' => 'required|exists:rooms,id',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'status' => 'required|in:pending,confirmed,cancelled',
        ]);
        $reservation->update($request->all());
        Room::where('id', $request->room_id)->update(['status' => $request->status == 'confirmed' ? 'terisi' : 'tersedia']);
        return redirect()->route('reservasi.index')->with('success', 'Reservasi berhasil diupdate');
    }

    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        if (session('role') !== 'admin' && $reservation->user_id != session('user')) {
            abort(403);
        }
        $room_id = $reservation->room_id;
        $reservation->delete();
        Room::where('id', $room_id)->update(['status' => 'tersedia']);
        return redirect()->route('reservasi.index')->with('success', 'Reservasi berhasil dihapus');
    }

    // Tampilkan form review
    public function reviewForm($id)
    {
        $reservation = Reservation::with('room')->findOrFail($id);
        if ($reservation->user_id != session('user')) {
            abort(403, 'Anda tidak berhak mengakses review ini.');
        }
        // Hanya bisa review jika status selesai dan belum pernah review
        if (!in_array($reservation->status, ['confirmed', 'checked_out'])) {
            return redirect()->back()->with('error', 'Reservasi belum selesai, tidak bisa review.');
        }
        if ($reservation->review) {
            return redirect()->back()->with('error', 'Reservasi ini sudah pernah direview.');
        }
        return view('contoh.reservasi.review', compact('reservation'));
    }

    // Simpan review
    public function simpanReview(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);
        if ($reservation->user_id != session('user')) {
            abort(403);
        }
        if (!in_array($reservation->status, ['confirmed', 'checked_out'])) {
            return back()->with('error', 'Reservasi belum selesai, tidak bisa review.');
        }
        if ($reservation->review) {
            return back()->with('error', 'Reservasi ini sudah pernah direview.');
        }
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'komentar' => 'nullable|string',
        ]);
        \App\Models\Review::create([
            'user_id' => session('user'),
            'room_id' => $reservation->room_id,
            'reservation_id' => $reservation->id,
            'rating' => $request->rating,
            'komentar' => $request->komentar,
        ]);
        // Tampilkan pesan sukses langsung di halaman review
        return view('contoh.reservasi.review', [
            'reservation' => $reservation,
            'success' => 'Review berhasil disimpan!'
        ]);
    }
} 