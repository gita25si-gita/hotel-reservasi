@extends('layouts.app')

@section('title', 'Riwayat Reservasi')

@section('content')
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title text-center text-primary text-uppercase">Status Pesanan</h6>
            <h1 class="mb-5">Riwayat <span class="text-primary text-uppercase">Reservasi Anda</span></h1>
        </div>

        @if(session('sukses'))
            <div class="alert alert-success text-center mb-4">
                <i class="fa fa-check-circle me-2"></i>{{ session('sukses') }}
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="card border-0 shadow-sm p-4 p-md-5">
                    <div class="d-flex justify-content-between align-items-start flex-wrap mb-3">
                        <div>
                            <h4 class="mb-1">{{ $booking['kode_reservasi'] }} • Kamar {{ $booking['kamar'] }}</h4>
                            <p class="text-muted mb-0">
                                Check-in: <strong>{{ \Carbon\Carbon::parse($booking['check_in'])->format('d M Y') }}</strong> —
                                Check-out: <strong>{{ \Carbon\Carbon::parse($booking['check_out'])->format('d M Y') }}</strong>
                                ({{ $booking['jumlah_malam'] }} malam)
                            </p>
                        </div>
                        <span class="badge bg-warning text-dark fs-6 px-3 py-2">{{ $booking['status_reservasi'] }}</span>
                    </div>

                    <hr>

                    {{-- Alur Progres sesuai Halaman 32 Proposal --}}
                    <h6 class="fw-bold mb-3">Progres Reservasi:</h6>
                    <ul class="list-group list-group-flush mb-4">
                        <li class="list-group-item text-success"><i class="fa fa-check-circle me-2"></i>Reservasi dibuat ({{ $booking['nama_tamu'] }})</li>
                        <li class="list-group-item text-success"><i class="fa fa-check-circle me-2"></i>Bukti pembayaran diunggah ({{ $booking['bukti_bayar'] }})</li>
                        <li class="list-group-item text-muted"><i class="fa fa-hourglass-half me-2"></i>Pembayaran diverifikasi oleh Admin / Resepsionis</li>
                        <li class="list-group-item text-muted"><i class="fa fa-circle me-2"></i>Check-in</li>
                        <li class="list-group-item text-muted"><i class="fa fa-circle me-2"></i>Check-out & Klaim Poin Reward</li>
                    </ul>

                    <div class="bg-light p-3 rounded mb-4">
                        <div class="d-flex justify-content-between">
                            <span>Total Pembayaran:</span>
                            <strong class="text-primary fs-5">Rp {{ number_format($booking['total_bayar'], 0, ',', '.') }}</strong>
                        </div>
                        @if($booking['antar_jemput'])
                            <small class="text-muted d-block">+ Layanan {{ $booking['arah_jemput'] }} ({{ $booking['no_penerbangan'] ?: 'Tanpa No. Penerbangan' }})</small>
                        @endif
                        @if($booking['potongan_poin'] > 0)
                            <small class="text-success d-block">- Diskon Tukar 500 Poin Reward</small>
                        @endif
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('home') }}" class="btn btn-dark py-3 px-4">Kembali ke Beranda</a>
                        <button onclick="window.print()" class="btn btn-primary py-3 px-4">
                            <i class="fa fa-print me-2"></i>Cetak Invoice Sementara
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection