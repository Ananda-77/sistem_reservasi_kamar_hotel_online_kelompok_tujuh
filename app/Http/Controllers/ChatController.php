<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;

class ChatController extends Controller
{
    // Tampilkan halaman chat untuk user
    public function index()
    {
        $userId = session('user');
        $user = User::find($userId);
        if (!$user || session('role') !== 'user') {
            return redirect('/login');
        }
        // Ambil semua pesan chat user ini (user & admin)
        $messages = Message::where('user_id', $userId)->orderBy('created_at')->get();
        return view('contoh.chat.index', compact('messages', 'user'));
    }

    // Kirim pesan dari user ke admin
    public function send(Request $request)
    {
        $userId = session('user');
        $user = User::find($userId);
        if (!$user || session('role') !== 'user') {
            return redirect('/login');
        }
        $request->validate([
            'message' => 'required|string',
        ]);
        Message::create([
            'user_id' => $userId,
            'sender' => 'user',
            'message' => $request->message,
        ]);
        return redirect()->route('chat.index');
    }

    // Daftar user yang pernah chat (untuk admin)
    public function adminList()
    {
        if (session('role') !== 'admin') {
            return redirect('/login');
        }
        // Ambil user yang pernah chat
        $users = \App\Models\User::whereHas('messages')->get();
        return view('contoh.chat.admin_list', compact('users'));
    }

    // Tampilkan chat dengan user tertentu (untuk admin)
    public function adminChat($userId)
    {
        if (session('role') !== 'admin') {
            return redirect('/login');
        }
        $user = \App\Models\User::findOrFail($userId);
        $messages = \App\Models\Message::where('user_id', $userId)->orderBy('created_at')->get();
        return view('contoh.chat.admin_chat', compact('messages', 'user'));
    }

    // Kirim balasan dari admin ke user
    public function adminSend(Request $request, $userId)
    {
        if (session('role') !== 'admin') {
            return redirect('/login');
        }
        $request->validate([
            'message' => 'required|string',
        ]);
        \App\Models\Message::create([
            'user_id' => $userId,
            'admin_id' => session('user'),
            'sender' => 'admin',
            'message' => $request->message,
        ]);
        return redirect()->route('chat.admin.chat', $userId);
    }
} 