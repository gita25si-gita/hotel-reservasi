<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function kamar()
    {
        return view('pages.room');
    }

    public function booking()
    {
        return view('pages.booking');
    }

    public function storeBooking(Request $request)
    {
        $request->validate([
            'nama_tamu' => 'required|string|max:100',
            'email'     => 'required|email',
            'no_hp'     => 'required|string|max:20',
            'check_in'  => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
            'kamar'     => 'required|string',
        ]);

        // Daftar harga kamar per malam sesuai proposal (Halaman 23)
        $hargaKamarList = [
            'Standard' => 850000,
            'Deluxe'   => 1250000,
            'Suite'    => 2800000,
        ];

        $hargaPerMalam = $hargaKamarList[$request->kamar] ?? 850000;
        $jumlahMalam = Carbon::parse($request->check_in)->diffInDays(Carbon::parse($request->check_out));
        $subtotalKamar = $hargaPerMalam * $jumlahMalam;

        // Fitur Layanan Antar Jemput Bandara (Rp 150.000) sesuai proposal (Halaman 28)
        $biayaAntarJemput = $request->has('antar_jemput') ? 150000 : 0;

        // Fitur Tukar 500 Poin Reward = potongan Rp 50.000 sesuai proposal (Halaman 28)
        $potonganPoin = $request->has('tukar_poin') ? 50000 : 0;

        $totalBayar = ($subtotalKamar + $biayaAntarJemput) - $potonganPoin;

        $dataBooking = [
            'kode_reservasi'     => 'ARC-' . str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT),
            'nama_tamu'          => $request->nama_tamu,
            'email'              => $request->email,
            'no_hp'              => $request->no_hp,
            'check_in'           => $request->check_in,
            'check_out'          => $request->check_out,
            'jumlah_malam'       => $jumlahMalam,
            'dewasa'             => $request->dewasa ?? 2,
            'anak'               => $request->anak ?? 0,
            'kamar'              => $request->kamar,
            'harga_per_malam'    => $hargaPerMalam,
            'subtotal_kamar'     => $subtotalKamar,
            'antar_jemput'       => $request->has('antar_jemput'),
            'arah_jemput'        => $request->arah_jemput,
            'waktu_jemput'       => $request->waktu_jemput,
            'no_penerbangan'     => $request->no_penerbangan,
            'biaya_antar_jemput' => $biayaAntarJemput,
            'potongan_poin'      => $potonganPoin,
            'total_bayar'        => $totalBayar,
            'permintaan'         => $request->permintaan,
            'batas_bayar'        => Carbon::now()->addHours(2)->format('d M Y, H:i'),
            'status_reservasi'   => 'Menunggu pembayaran',
            'bukti_bayar'        => null,
        ];

        session(['data_booking' => $dataBooking]);

        // Setelah konfirmasi pemesanan, arahkan ke Halaman Pembayaran (Halaman 29 proposal)
        return redirect()->route('booking.pembayaran');
    }

    public function pembayaran()
    {
        $booking = session('data_booking');

        if (!$booking) {
            return redirect()->route('booking');
        }

        return view('pages.pembayaran', compact('booking'));
    }

    public function storePembayaran(Request $request)
    {
        $booking = session('data_booking');

        if (!$booking) {
            return redirect()->route('booking');
        }

        $request->validate([
            'bukti_pembayaran' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ], [
            'bukti_pembayaran.required' => 'Silakan pilih file bukti transfer terlebih dahulu.',
            'bukti_pembayaran.mimes'    => 'Format file harus JPG, PNG, atau PDF.',
        ]);

        // Simpan file bukti transfer ke folder public/assets/bukti_bayar
        $file = $request->file('bukti_pembayaran');
        $namaFile = $booking['kode_reservasi'] . '_' . time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('assets/bukti_bayar'), $namaFile);

        // Perbarui status menjadi "Menunggu verifikasi" sesuai proposal (Halaman 30)
        $booking['bukti_bayar'] = $namaFile;
        $booking['status_reservasi'] = 'Menunggu verifikasi';
        session(['data_booking' => $booking]);

        return redirect()->route('booking.riwayat')->with('sukses', 'Bukti pembayaran berhasil dikirim! Pesanan Anda sedang menunggu verifikasi admin.');
    }

    public function riwayatBooking()
    {
        $booking = session('data_booking');

        if (!$booking) {
            return redirect()->route('booking');
        }

        return view('pages.riwayat-reservasi', compact('booking'));
    }
}