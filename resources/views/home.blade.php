@extends('layouts.app')

@section('title', 'Beranda')

@section('content')

<!-- Carousel Start -->
<div class="container-fluid p-0 mb-5">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="{{ asset('assets/img/carousel-1.jpg') }}" alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 700px;">
                        <h6 class="section-title text-white text-uppercase mb-3 animated slideInDown">Hotel Archata</h6>
                        <h1 class="display-3 text-white mb-4 animated slideInDown">Temukan Hotel Mewah Pilihan Anda</h1>
                        <a href="#kamar" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Lihat Kamar</a>
                        <a href="#booking" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Pesan Kamar</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="{{ asset('assets/img/carousel-2.jpg') }}" alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 700px;">
                        <h6 class="section-title text-white text-uppercase mb-3 animated slideInDown">Hotel Archata</h6>
                        <h1 class="display-3 text-white mb-4 animated slideInDown">Nyaman, Aman, dan Profesional</h1>
                        <a href="#kamar" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Lihat Kamar</a>
                        <a href="#booking" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Pesan Kamar</a>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<!-- Carousel End -->


<!-- Booking Start -->
<div id="booking" class="container-fluid booking pb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container">
        <div class="bg-white shadow" style="padding: 35px;">
            {{-- Nanti action diarahkan ke controller reservasi --}}
            <form action="#" method="GET">
                <div class="row g-2">
                    <div class="col-md-10">
                        <div class="row g-2">
                            <div class="col-md-3">
                                <div class="date" id="date1" data-target-input="nearest">
                                    <input type="text" name="check_in" class="form-control datetimepicker-input"
                                        placeholder="Check in" data-target="#date1" data-toggle="datetimepicker" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="date" id="date2" data-target-input="nearest">
                                    <input type="text" name="check_out" class="form-control datetimepicker-input"
                                        placeholder="Check out" data-target="#date2" data-toggle="datetimepicker" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <select name="dewasa" class="form-select">
                                    <option selected>Dewasa</option>
                                    <option value="1">1 Dewasa</option>
                                    <option value="2">2 Dewasa</option>
                                    <option value="3">3 Dewasa</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select name="anak" class="form-select">
                                    <option selected>Anak</option>
                                    <option value="1">1 Anak</option>
                                    <option value="2">2 Anak</option>
                                    <option value="3">3 Anak</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary w-100">Cek Kamar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Booking End -->


<!-- About Start -->
<div id="tentang" class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <h6 class="section-title text-start text-primary text-uppercase">Tentang Kami</h6>
                <h1 class="mb-4">Selamat Datang di <span class="text-primary text-uppercase">Archata</span></h1>
                <p class="mb-4">Archata menyediakan layanan reservasi kamar yang cepat, akurat, dan terintegrasi. Tamu dapat memeriksa ketersediaan kamar dan memesan secara mandiri, sementara pengelola hotel dapat memantau seluruh data reservasi dalam satu sistem.</p>
                <div class="row g-3 pb-4">
                    <div class="col-sm-4 wow fadeIn" data-wow-delay="0.1s">
                        <div class="border rounded p-1">
                            <div class="border rounded text-center p-4">
                                <i class="fa fa-hotel fa-2x text-primary mb-2"></i>
                                <h2 class="mb-1" data-toggle="counter-up">50</h2>
                                <p class="mb-0">Kamar</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 wow fadeIn" data-wow-delay="0.3s">
                        <div class="border rounded p-1">
                            <div class="border rounded text-center p-4">
                                <i class="fa fa-users-cog fa-2x text-primary mb-2"></i>
                                <h2 class="mb-1" data-toggle="counter-up">20</h2>
                                <p class="mb-0">Staf</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 wow fadeIn" data-wow-delay="0.5s">
                        <div class="border rounded p-1">
                            <div class="border rounded text-center p-4">
                                <i class="fa fa-users fa-2x text-primary mb-2"></i>
                                <h2 class="mb-1" data-toggle="counter-up">1000</h2>
                                <p class="mb-0">Pelanggan</p>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="btn btn-primary py-3 px-5 mt-2" href="#kamar">Lihat Selengkapnya</a>
            </div>
            <div class="col-lg-6">
                <div class="row g-3">
                    <div class="col-6 text-end">
                        <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.1s" src="{{ asset('assets/img/about-1.jpg') }}" style="margin-top: 25%;">
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
        </div>
    </div>
</div>
<!-- About End -->


<!-- Room Start -->
<div id="kamar" class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title text-center text-primary text-uppercase">Kamar Kami</h6>
            <h1 class="mb-5">Jelajahi <span class="text-primary text-uppercase">Kamar</span> Kami</h1>
        </div>
        <div class="row g-4">
            {{-- Data sementara (statis). Nanti diganti @foreach($rooms as $room) dari database --}}
            @php
                $rooms = [
                    ['img' => 'room-1.jpg', 'nama' => 'Junior Suite',    'harga' => 350000, 'delay' => '0.1s'],
                    ['img' => 'room-2.jpg', 'nama' => 'Executive Suite', 'harga' => 500000, 'delay' => '0.3s'],
                    ['img' => 'room-3.jpg', 'nama' => 'Super Deluxe',    'harga' => 750000, 'delay' => '0.6s'],
                ];
            @endphp

            @foreach($rooms as $room)
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="{{ $room['delay'] }}">
                <div class="room-item shadow rounded overflow-hidden">
                    <div class="position-relative">
                        <img class="img-fluid" src="{{ asset('assets/img/' . $room['img']) }}" alt="{{ $room['nama'] }}">
                        <small class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4">Rp {{ number_format($room['harga'], 0, ',', '.') }}/Malam</small>
                    </div>
                    <div class="p-4 mt-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h5 class="mb-0">{{ $room['nama'] }}</h5>
                            <div class="ps-2">
                                @for($i = 0; $i < 5; $i++)
                                    <small class="fa fa-star text-primary"></small>
                                @endfor
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <small class="border-end me-3 pe-3"><i class="fa fa-bed text-primary me-2"></i>2 Kasur</small>
                            <small class="border-end me-3 pe-3"><i class="fa fa-bath text-primary me-2"></i>1 Kamar Mandi</small>
                            <small><i class="fa fa-wifi text-primary me-2"></i>Wifi</small>
                        </div>
                        <p class="text-body mb-3">Kamar nyaman dengan fasilitas lengkap untuk menunjang kenyamanan menginap Anda.</p>
                        <div class="d-flex justify-content-between">
                            <a class="btn btn-sm btn-primary rounded py-2 px-4" href="#">Detail</a>
                            <a class="btn btn-sm btn-dark rounded py-2 px-4" href="#booking">Pesan Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Room End -->


<!-- Service Start -->
<div id="layanan" class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title text-center text-primary text-uppercase">Layanan Kami</h6>
            <h1 class="mb-5">Jelajahi <span class="text-primary text-uppercase">Layanan</span> Kami</h1>
        </div>
        <div class="row g-4">
            @php
                $layanan = [
                    ['fa-hotel',        'Kamar & Apartemen',  '0.1s'],
                    ['fa-utensils',     'Makanan & Restoran', '0.2s'],
                    ['fa-spa',          'Spa & Fitness',      '0.3s'],
                    ['fa-swimmer',      'Olahraga & Game',    '0.4s'],
                    ['fa-glass-cheers', 'Acara & Pesta',      '0.5s'],
                    ['fa-dumbbell',     'Gym & Yoga',         '0.6s'],
                ];
            @endphp

            @foreach($layanan as [$ikon, $judul, $delay])
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="{{ $delay }}">
                <a class="service-item rounded" href="#">
                    <div class="service-icon bg-transparent border rounded p-1">
                        <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                            <i class="fa {{ $ikon }} fa-2x text-primary"></i>
                        </div>
                    </div>
                    <h5 class="mb-3">{{ $judul }}</h5>
                    <p class="text-body mb-0">Layanan berkualitas untuk kenyamanan dan kepuasan setiap tamu hotel.</p>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Service End -->

@endsection