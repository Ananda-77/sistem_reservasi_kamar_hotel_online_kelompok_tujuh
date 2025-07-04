<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [App\Http\Controllers\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\LoginController::class, 'login']);

Route::get('/register', [App\Http\Controllers\RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [App\Http\Controllers\RegisterController::class, 'register']);
Route::post('/logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', [App\Http\Controllers\LoginController::class, 'dashboard'])->name('dashboard');

Route::get('/dashboard-admin', [App\Http\Controllers\AdminController::class, 'dashboardAdmin'])->name('dashboard.admin');

Route::resource('reservasi', App\Http\Controllers\ReservationController::class);
Route::resource('kamar', App\Http\Controllers\RoomController::class);

Route::get('/profil', [App\Http\Controllers\ProfileController::class, 'show'])->name('profil');
Route::post('/profil', [App\Http\Controllers\ProfileController::class, 'update'])->name('profil.update');

// Fitur Check In & Check Out Admin
Route::get('/admin/checkin', [App\Http\Controllers\AdminController::class, 'showCheckin'])->name('admin.checkin');
Route::get('/admin/checkout', [App\Http\Controllers\AdminController::class, 'showCheckout'])->name('admin.checkout');

// Aksi Check In & Check Out
Route::post('/admin/checkin/{id}', [App\Http\Controllers\AdminController::class, 'checkin'])->name('admin.checkin.aksi');
Route::post('/admin/checkout/{id}', [App\Http\Controllers\AdminController::class, 'checkout'])->name('admin.checkout.aksi');

Route::get('/admin/inhouse', [App\Http\Controllers\AdminController::class, 'showInhouse'])->name('admin.inhouse');

Route::resource('admin/room-types', App\Http\Controllers\RoomTypeController::class)->only(['index','create','store'])->names('room_types');
Route::resource('admin/user', App\Http\Controllers\UserController::class)->names('user');

Route::get('/admin/laporan/kamar', [App\Http\Controllers\AdminController::class, 'laporanKamar'])->name('laporan.kamar');
Route::get('/admin/laporan/layanan', [App\Http\Controllers\AdminController::class, 'laporanLayanan'])->name('laporan.layanan');

// Route untuk user melihat riwayat reservasi (tanpa middleware auth, cukup cek session di controller)
Route::get('/riwayat-reservasi', [App\Http\Controllers\UserController::class, 'riwayatReservasi'])->name('user.riwayat_reservasi');

// Route untuk review kamar oleh user
Route::get('/reservasi/{id}/review', [App\Http\Controllers\ReservationController::class, 'reviewForm'])->name('reservasi.review.form');
Route::post('/reservasi/{id}/review', [App\Http\Controllers\ReservationController::class, 'simpanReview'])->name('reservasi.review.simpan');

// Route tes session flash message
Route::get('/tes-session', function () {
    session()->flash('success', 'Tes pesan sukses!');
    return redirect('/riwayat-reservasi');
});

// Route chat user
Route::get('/chat', [App\Http\Controllers\ChatController::class, 'index'])->name('chat.index');
Route::post('/chat/send', [App\Http\Controllers\ChatController::class, 'send'])->name('chat.send');

// Route chat admin
Route::get('/admin/chat', [App\Http\Controllers\ChatController::class, 'adminList'])->name('chat.admin.list');
Route::get('/admin/chat/{userId}', [App\Http\Controllers\ChatController::class, 'adminChat'])->name('chat.admin.chat');
Route::post('/admin/chat/{userId}/send', [App\Http\Controllers\ChatController::class, 'adminSend'])->name('chat.admin.send');
