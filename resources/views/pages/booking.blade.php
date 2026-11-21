@extends('layouts.app')

@section('title', 'Pesan Kamar')

@section('content')

{{-- ===== Header halaman ===== --}}
<div class="container-fluid page-header mb-5 p-0" style="background-image: url('{{ asset('assets/img/carousel-1.jpg') }}');">
    <div class="container-fluid page-header-inner py-5">
        <div class="container text-center pb-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Pesan Kamar</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Pesan Kamar</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

{{-- ===== Form pemesanan sesuai Proposal Archata ===== --}}
<div class="container-xxl py-5 pb-5">
    <div class="container pb-5">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title text-center text-primary text-uppercase">Reservasi Kamar</h6>
            <h1 class="mb-5">Lengkapi <span class="text-primary text-uppercase">Masa Menginap Anda</span></h1>
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

        <form action="{{ route('booking.store') }}" method="POST">
            @csrf
            <div class="row g-5 align-items-start">
                {{-- Kolom Kiri: Data Tamu, Antar Jemput, & Poin Reward --}}
                <div class="col-lg-7">
                    {{-- 1. Data Tamu --}}
                    <div class="card border-0 shadow-sm p-4 mb-4">
                        <h5 class="mb-3 text-primary">1. Data Tamu</h5>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="nama" name="nama_tamu" value="{{ old('nama_tamu', auth()->user()->name ?? '') }}" placeholder="Nama Lengkap" required>
                                    <label for="nama">Nama Lengkap</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', auth()->user()->email ?? '') }}" placeholder="Email" required>
                                    <label for="email">Email</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ old('no_hp') }}" placeholder="No. HP" required>
                                    <label for="no_hp">No. HP (Sesuai identitas saat check-in)</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="date" class="form-control hitung-total" id="checkin" name="check_in" value="{{ old('check_in', date('Y-m-d')) }}" min="{{ date('Y-m-d') }}" required>
                                    <label for="checkin">Check-in</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="date" class="form-control hitung-total" id="checkout" name="check_out" value="{{ old('check_out', date('Y-m-d', strtotime('+1 day'))) }}" min="{{ date('Y-m-d', strtotime('+1 day')) }}" required>
                                    <label for="checkout">Check-out</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" id="dewasa" name="dewasa">
                                        <option value="1">1 Dewasa</option>
                                        <option value="2" selected>2 Dewasa</option>
                                        <option value="3">3 Dewasa</option>
                                    </select>
                                    <label for="dewasa">Dewasa</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" id="anak" name="anak">
                                        <option value="0" selected>Tanpa Anak</option>
                                        <option value="1">1 Anak</option>
                                        <option value="2">2 Anak</option>
                                    </select>
                                    <label for="anak">Anak</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <select class="form-select hitung-total" id="kamar" name="kamar">
                                        <option value="Standard" data-harga="850000" {{ old('kamar', request('kamar')) === 'Standard' ? 'selected' : '' }}>Standard - Rp 850.000 / malam</option>
                                        <option value="Deluxe" data-harga="1250000" {{ old('kamar', request('kamar')) === 'Deluxe' ? 'selected' : '' }}>Deluxe - Rp 1.250.000 / malam</option>
                                        <option value="Suite" data-harga="2800000" {{ old('kamar', request('kamar')) === 'Suite' ? 'selected' : '' }}>Suite Eksekutif - Rp 2.800.000 / malam</option>
                                    </select>
                                    <label for="kamar">Pilih Tipe Kamar</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Catatan untuk hotel" id="pesan" name="permintaan" style="height: 90px">{{ old('permintaan') }}</textarea>
                                    <label for="pesan">Catatan untuk Hotel (Opsional)</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- 2. Layanan Antar Jemput Bandara (Proposal Halaman 28) --}}
                    <div class="card border-0 shadow-sm p-4 mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="form-check">
                                <input class="form-check-input hitung-total" type="checkbox" id="antar_jemput" name="antar_jemput" value="1">
                                <label class="form-check-label fw-bold" for="antar_jemput">
                                    Tambahkan Layanan Antar Jemput Bandara
                                </label>
                            </div>
                            <span class="badge bg-primary">Rp 150.000</span>
                        </div>
                        <div id="detail-jemput" class="row g-3 mt-1" style="display: none;">
                            <div class="col-md-12">
                                <select class="form-select" name="arah_jemput">
                                    <option value="Jemput dari Bandara">Jemput dari Bandara Sultan Syarif Kasim II</option>
                                    <option value="Antar ke Bandara">Antar ke Bandara Sultan Syarif Kasim II</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="datetime-local" class="form-control" id="waktu_jemput" name="waktu_jemput">
                                    <label for="waktu_jemput">Tanggal & Jam</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="no_penerbangan" name="no_penerbangan" placeholder="Contoh: GA 204">
                                    <label for="no_penerbangan">No. Penerbangan (Opsional)</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- 3. Poin Reward (Proposal Halaman 28) --}}
                    <div class="card border-0 shadow-sm p-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="form-check">
                                <input class="form-check-input hitung-total" type="checkbox" id="tukar_poin" name="tukar_poin" value="1">
                                <label class="form-check-label fw-bold" for="tukar_poin">
                                    Tukar 500 Poin Reward menjadi potongan Rp 50.000
                                </label>
                            </div>
                            <span class="badge bg-secondary">Saldo: 500 Poin</span>
                        </div>
                    </div>
                </div>

                {{-- Kolom Kanan: Ringkasan Pemesanan & Total Biaya (Proposal Halaman 28) --}}
                <div class="col-lg-5">
                    <div class="card border-0 shadow-sm p-4 bg-white">
                        <h5 class="mb-3 text-primary">Ringkasan Pemesanan</h5>
                        <hr>
                        <div class="d-flex justify-content-between mb-2">
                            <span id="label-kamar">Kamar (1 malam)</span>
                            <span id="harga-kamar">Rp 850.000</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2" id="row-jemput" style="display: none !important;">
                            <span>Antar jemput bandara</span>
                            <span>Rp 150.000</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2 text-success" id="row-poin" style="display: none !important;">
                            <span>Potongan poin reward</span>
                            <span>- Rp 50.000</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h5 class="mb-0">Total Pembayaran</h5>
                            <h4 class="text-primary fw-bold mb-0" id="total-bayar">Rp 850.000</h4>
                        </div>

                        <button class="btn btn-primary w-100 py-3" type="submit">
                            Konfirmasi Pemesanan <i class="fa fa-arrow-right ms-2"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    function formatRupiah(angka) {
        return 'Rp ' + angka.toLocaleString('id-ID');
    }

    function hitungRingkasan() {
        const selectKamar = document.getElementById('kamar');
        const hargaPerMalam = parseInt(selectKamar.options[selectKamar.selectedIndex].getAttribute('data-harga'));
        const namaKamar = selectKamar.value;

        const checkin = new Date(document.getElementById('checkin').value);
        const checkout = new Date(document.getElementById('checkout').value);
        let malam = Math.round((checkout - checkin) / (1000 * 60 * 60 * 24));
        if (isNaN(malam) || malam < 1) malam = 1;

        const subtotalKamar = hargaPerMalam * malam;
        const pakaiJemput = document.getElementById('antar_jemput').checked;
        const pakaiPoin = document.getElementById('tukar_poin').checked;

        document.getElementById('detail-jemput').style.display = pakaiJemput ? 'flex' : 'none';
        document.getElementById('row-jemput').style.setProperty('display', pakaiJemput ? 'flex' : 'none', 'important');
        document.getElementById('row-poin').style.setProperty('display', pakaiPoin ? 'flex' : 'none', 'important');

        const total = subtotalKamar + (pakaiJemput ? 150000 : 0) - (pakaiPoin ? 50000 : 0);

        document.getElementById('label-kamar').innerText = `Kamar ${namaKamar} (${malam} malam)`;
        document.getElementById('harga-kamar').innerText = formatRupiah(subtotalKamar);
        document.getElementById('total-bayar').innerText = formatRupiah(total);
    }

    document.querySelectorAll('.hitung-total').forEach(el => {
        el.addEventListener('change', hitungRingkasan);
    });
    window.addEventListener('DOMContentLoaded', hitungRingkasan);
</script>

@endsection