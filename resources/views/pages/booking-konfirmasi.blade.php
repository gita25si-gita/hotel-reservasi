@extends('layouts.app')

@section('content')
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title text-center text-primary text-uppercase">Reservasi Berhasil</h6>
            <h1 class="mb-5">Bukti <span class="text-primary text-uppercase">Pemesanan Kamar</span></h1>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm p-4 p-md-5">
                    <div class="alert alert-success text-center mb-4">
                        <h5 class="mb-1"><i class="fa fa-check-circle me-2"></i>Terima kasih, {{ $booking['nama_tamu'] }}!</h5>
                        <p class="mb-0">Pesanan Anda telah berhasil dikirim. Tunjukkan kode booking di bawah ini saat melakukan check-in di resepsionis.</p>
                    </div>

                    <div class="text-center mb-4 p-3 bg-light rounded">
                        <span class="text-muted d-block">Kode Booking Anda</span>
                        <h2 class="text-primary fw-bold mb-0">{{ $booking['kode_booking'] }}</h2>
                    </div>

                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th width="35%">Nama Tamu</th>
                                <td>{{ $booking['nama_tamu'] }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $booking['email'] }}</td>
                            </tr>
                            <tr>
                                <th>No. HP</th>
                                <td>{{ $booking['no_hp'] }}</td>
                            </tr>
                            <tr>
                                <th>Check-in</th>
                                <td>{{ \Carbon\Carbon::parse($booking['check_in'])->format('d M Y') }}</td>
                            </tr>
                            <tr>
                                <th>Check-out</th>
                                <td>{{ \Carbon\Carbon::parse($booking['check_out'])->format('d M Y') }}</td>
                            </tr>
                            @foreach($booking as $key => $value)
                                @if(!in_array($key, ['nama_tamu', 'email', 'no_hp', 'check_in', 'check_out', 'kode_booking']) && !empty($value))
                                    <tr>
                                        <th>{{ ucwords(str_replace('_', ' ', $key)) }}</th>
                                        <td>{{ $value }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('home') }}" class="btn btn-dark py-3 px-4">Kembali ke Beranda</a>
                        <button onclick="window.print()" class="btn btn-primary py-3 px-4">
                            <i class="fa fa-print me-2"></i>Cetak Bukti
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection