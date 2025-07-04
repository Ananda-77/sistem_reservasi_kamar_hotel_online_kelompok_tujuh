<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::latest()->get();
        return view('contoh.kamar.index', compact('rooms'));
    }

    public function create()
    {
        return view('contoh.kamar.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'tipe' => 'required',
            'harga' => 'required|numeric',
            'status' => 'required|in:tersedia,terisi',
        ]);
        Room::create($request->all());
        return redirect()->route('kamar.index')->with('success', 'Kamar berhasil ditambahkan');
    }

    public function edit($id)
    {
        $room = Room::findOrFail($id);
        return view('contoh.kamar.edit', compact('room'));
    }

    public function update(Request $request, $id)
    {
        $room = Room::findOrFail($id);
        $request->validate([
            'nama' => 'required',
            'tipe' => 'required',
            'harga' => 'required|numeric',
            'status' => 'required|in:tersedia,terisi',
        ]);
        $room->update($request->all());
        return redirect()->route('kamar.index')->with('success', 'Kamar berhasil diupdate');
    }

    public function destroy($id)
    {
        $room = Room::findOrFail($id);
        $room->delete();
        return redirect()->route('kamar.index')->with('success', 'Kamar berhasil dihapus');
    }
} 