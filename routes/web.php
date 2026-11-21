<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

// Halaman Utama & Navigasi
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/kamar', [HomeController::class, 'kamar'])->name('kamar');

// Alur Reservasi sesuai Proposal Hotel Archata
Route::get('/booking', [HomeController::class, 'booking'])->name('booking');
Route::post('/booking', [HomeController::class, 'storeBooking'])->name('booking.store');

Route::get('/booking/pembayaran', [HomeController::class, 'pembayaran'])->name('booking.pembayaran');
Route::post('/booking/pembayaran', [HomeController::class, 'storePembayaran'])->name('booking.pembayaran.store');

Route::get('/booking/riwayat', [HomeController::class, 'riwayatBooking'])->name('booking.riwayat');

// Route Autentikasi (Login & Logout)
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');