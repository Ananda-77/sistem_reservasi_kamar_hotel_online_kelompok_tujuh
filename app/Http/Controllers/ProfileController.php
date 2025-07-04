<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class ProfileController extends Controller
{
    public function show()
    {
        $user = User::findOrFail(session('user'));
        return view('contoh.profil', compact('user'));
    }

    public function update(Request $request)
    {
        $user = User::findOrFail(session('user'));
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        $data = $request->only('name', 'email');
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $path = $file->store('profile', 'public');
            $data['photo'] = $path;
        }
        $user->update($data);
        return redirect()->back()->with('success', 'Profil berhasil diperbarui');
    }
} 