<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\RoomType;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::latest()->get();
        return view('contoh.kamar.index', compact('rooms'));
    }

    public function create()
    {
        $roomTypes = RoomType::all();
        return view('contoh.kamar.create', compact('roomTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'room_type_id' => 'required|exists:room_types,id',
            'harga' => 'required|numeric',
            'status' => 'required|in:tersedia,terisi',
        ]);

        Room::create([
            'nama' => $request->nama,
            'room_type_id' => $request->room_type_id,
            'harga' => $request->harga,
            'status' => $request->status,
        ]);

        return redirect()->route('kamar.index')->with('success', 'Kamar berhasil ditambahkan');
    }


    public function edit($id)
    {

        $room = Room::findOrFail($id);
        $roomTypes = RoomType::all();
        return view('contoh.kamar.edit', compact('room', 'roomTypes'));
        

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'room_type_id' => 'required|exists:room_types,id',
            'harga' => 'required|numeric',
            'status' => 'required|in:tersedia,terisi',
        ]);

        $room = Room::findOrFail($id);
        $room->update([
            'nama' => $request->nama,
            'room_type_id' => $request->room_type_id,
            'harga' => $request->harga,
            'status' => $request->status,
        ]);

        return redirect()->route('kamar.index')->with('success', 'Kamar berhasil diperbarui');
    }


    public function destroy($id)
    {
        $room = Room::findOrFail($id);
        $room->delete();
        return redirect()->route('kamar.index')->with('success', 'Kamar berhasil dihapus');
    }
    public function roomType()
    {
        return $this->belongsTo(RoomType::class);
    }

} 