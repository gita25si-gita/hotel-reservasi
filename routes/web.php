<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman Utama & Navigasi
Route::view('/', 'home')->name('home');
Route::view('/kamar', 'pages.room')->name('kamar');
Route::view('/booking', 'pages.booking')->name('booking');

// Proses Kirim / Simpan Booking (Sementara menggunakan Closure)
Route::post('/booking', function (Request $request) {
    $request->validate([
        'nama_tamu' => 'required|string|max:100',
        'email'     => 'required|email',
        'no_hp'     => 'required|string|max:20',
        'check_in'  => 'required|date|after_or_equal:today',
        'check_out' => 'required|date|after:check_in',
    ]);

    return redirect()->route('booking')->with('sukses', 'Pesanan Anda berhasil dikirim!');
})->name('booking.store');

// Route Autentikasi (Login & Logout)
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
