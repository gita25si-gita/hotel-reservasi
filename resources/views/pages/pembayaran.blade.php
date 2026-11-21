@extends('layouts.app')

@section('title', 'Pembayaran Reservasi')

@section('content')
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title text-center text-primary text-uppercase">Pembayaran</h6>
            <h1 class="mb-5">Selesaikan <span class="text-primary text-uppercase">Pembayaran Anda</span></h1>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card border-0 shadow-sm p-4 p-md-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Kode Reservasi</span>
                        <span class="badge bg-dark fs-6">{{ $booking['kode_reservasi'] }}</span>
                    </div>

                    <div class="p-4 bg-light rounded mb-4">
                        <span class="text-muted d-block">Total Pembayaran</span>
                        <h2 class="text-primary fw-bold mb-1">Rp {{ number_format($booking['total_bayar'], 0, ',', '.') }}</h2>
                        <small class="text-danger"><i class="fa fa-clock me-1"></i>Bayar sebelum {{ $booking['batas_bayar'] }} WIB</small>
                        <hr>
                        <p class="mb-1 fw-bold">Rekening Tujuan Transfer:</p>
                        <p class="mb-0">Bank Mandiri / BCA — <strong>108-00-9876543-2</strong> a.n. <strong>Hotel Archata Pekanbaru</strong></p>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('booking.pembayaran.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="bukti_pembayaran" class="form-label fw-bold">Unggah Bukti Pembayaran (JPG, PNG, PDF)</label>
                            <input type="file" class="form-control form-control-lg" id="bukti_pembayaran" name="bukti_pembayaran" accept=".jpg,.jpeg,.png,.pdf" required>
                            <div class="form-text">Maksimal ukuran file 2MB. Status akan otomatis berubah menjadi <strong>Menunggu verifikasi</strong>.</div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-3">
                            <i class="fa fa-upload me-2"></i>Kirim Bukti Pembayaran
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection