@extends('layouts.app')

@section('title', 'Kamar')

@section('content')

{{-- ===== Header halaman ===== --}}
<div class="container-fluid page-header mb-5 p-0" style="background-image: url('{{ asset('assets/img/carousel-1.jpg') }}');">
    <div class="container-fluid page-header-inner py-5">
        <div class="container text-center pb-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Kamar</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Kamar</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

{{-- ===== Daftar kamar ===== --}}
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title text-center text-primary text-uppercase">Kamar Kami</h6>
            <h1 class="mb-5">Jelajahi <span class="text-primary text-uppercase">Kamar</span> Kami</h1>
        </div>

        {{-- Data sementara (statis). Nanti diganti data dari database: @foreach($rooms as $room) --}}
        @php
            $rooms = [
                ['img' => 'room-1.jpg', 'nama' => 'Standard', 'harga' => 850000,  'bed' => '2 Kasur', 'bath' => '1 Kamar Mandi', 'desc' => 'Kamar nyaman dengan dua tempat tidur dan pemandangan taman.'],
                ['img' => 'room-2.jpg', 'nama' => 'Deluxe',   'harga' => 1250000, 'bed' => '2 Kasur', 'bath' => '1 Kamar Mandi', 'desc' => 'Ruang kerja yang luas dan perabotan premium untuk menunjang istirahat Anda.'],
                ['img' => 'room-3.jpg', 'nama' => 'Suite',    'harga' => 2800000, 'bed' => '3 Kasur', 'bath' => '2 Kamar Mandi', 'desc' => 'Ruang tamu pribadi dengan kenyamanan menyeluruh untuk tamu istimewa.'],
            ];
        @endphp

        <div class="row g-4">
            @foreach($rooms as $i => $room)
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="{{ 0.1 + $i * 0.2 }}s">
                <div class="room-item shadow rounded overflow-hidden">
                    <div class="position-relative">
                        <img class="img-fluid" src="{{ asset('assets/img/' . $room['img']) }}" alt="{{ $room['nama'] }}">
                        <small class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4">Rp {{ number_format($room['harga'], 0, ',', '.') }}/Malam</small>
                    </div>
                    <div class="p-4 mt-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h5 class="mb-0">{{ $room['nama'] }}</h5>
                            <div class="ps-2">
                                @for($s = 0; $s < 5; $s++)
                                    <small class="fa fa-star text-primary"></small>
                                @endfor
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <small class="border-end me-3 pe-3"><i class="fa fa-bed text-primary me-2"></i>{{ $room['bed'] }}</small>
                            <small class="border-end me-3 pe-3"><i class="fa fa-bath text-primary me-2"></i>{{ $room['bath'] }}</small>
                            <small><i class="fa fa-wifi text-primary me-2"></i>Wifi</small>
                        </div>
                        <p class="text-body mb-3">{{ $room['desc'] }}</p>
                        <div class="d-flex justify-content-between">
                            <a class="btn btn-sm btn-primary rounded py-2 px-4" href="#">Detail</a>
                            <a class="btn btn-sm btn-dark rounded py-2 px-4" href="{{ route('booking', ['kamar' => $room['nama']]) }}">Pesan Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
