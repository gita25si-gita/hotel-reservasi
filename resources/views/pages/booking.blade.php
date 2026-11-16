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

{{-- ===== Form pemesanan ===== --}}
{{-- Tambahkan padding bawah (pb-5) yang lebih besar agar tidak menempel ke footer --}}
<div class="container-xxl py-5 pb-5">
    <div class="container pb-5">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title text-center text-primary text-uppercase">Reservasi Kamar</h6>
            <h1 class="mb-5">Pesan <span class="text-primary text-uppercase">Kamar Mewah</span></h1>
        </div>

        @if(session('sukses'))
            <div class="alert alert-success text-center">{{ session('sukses') }}</div>
        @endif

        {{-- Gunakan align-items-start agar form dimulai dari atas dan tidak meluber ke bawah --}}
        <div class="row g-5 align-items-start">
            <div class="col-lg-6">
                <div class="row g-3">
                    <div class="col-6 text-end">
                        <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.1s" src="{{ asset('assets/img/about-1.jpg') }}">
                    </div>
                    <div class="col-6 text-start">
                        <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.3s" src="{{ asset('assets/img/about-2.jpg') }}">
                    </div>
                    <div class="col-6 text-end">
                        <img class="img-fluid rounded w-50 wow zoomIn" data-wow-delay="0.5s" src="{{ asset('assets/img/about-3.jpg') }}">
                    </div>
                    <div class="col-6 text-start">
                        <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.7s" src="{{ asset('assets/img/about-4.jpg') }}">
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="wow fadeInUp" data-wow-delay="0.2s">
                    <form action="{{ route('booking.store') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="nama" name="nama_tamu" placeholder="Nama Lengkap" required>
                                    <label for="nama">Nama Lengkap</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                                    <label for="email">Email</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="No. HP" required>
                                    <label for="no_hp">No. HP</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="date" class="form-control" id="checkin" name="check_in" placeholder="Check-in" required>
                                    <label for="checkin">Check-in</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="date" class="form-control" id="checkout" name="check_out" placeholder="Check-out" required>
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
                                        <option value="3">3 Anak</option>
                                    </select>
                                    <label for="anak">Anak</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <select class="form-select" id="kamar" name="kamar">
                                        @foreach(['Standard', 'Deluxe', 'Suite'] as $k)
                                            <option value="{{ $k }}" {{ request('kamar') === $k ? 'selected' : '' }}>{{ $k }}</option>
                                        @endforeach
                                    </select>
                                    <label for="kamar">Pilih Kamar</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Permintaan Khusus" id="pesan" name="permintaan" style="height: 100px"></textarea>
                                    <label for="pesan">Permintaan Khusus</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Pesan Sekarang</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
