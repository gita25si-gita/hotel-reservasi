@extends('layouts.app')

@section('title', 'Login')

@section('content')

{{-- ===== Header halaman ===== --}}
<div class="container-fluid page-header mb-5 p-0" style="background-image: url('{{ asset('assets/img/carousel-1.jpg') }}');">
    <div class="container-fluid page-header-inner py-5">
        <div class="container text-center pb-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Login</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Login</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

{{-- ===== Form Login ===== --}}
<div class="container-xxl py-5 pb-5">
    <div class="container pb-5">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title text-center text-primary text-uppercase">— AKUN ARCHATA —</h6>
            <h1 class="mb-5" style="font-family: serif; font-weight: normal;">Selamat datang kembali</h1>
        </div>

        {{-- Pesan Status / Sukses --}}
        @if(session('status'))
            <div class="alert alert-success text-center mb-4">{{ session('status') }}</div>
        @endif

        {{-- Pesan Error Validasi --}}
        @if($errors->any())
            <div class="alert alert-danger text-center mb-4">
                <ul class="mb-0 list-unstyled">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                <div class="wow fadeInUp" data-wow-delay="0.2s">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="email" class="form-label text-dark fw-medium small text-uppercase">Email</label>
                                <input type="email" class="form-control py-3" id="email" name="email" placeholder="nama@email.com" value="{{ old('email') }}" required autofocus>
                            </div>
                            <div class="col-12">
                                <label for="password" class="form-label text-dark fw-medium small text-uppercase">Kata sandi</label>
                                <input type="password" class="form-control py-3" id="password" name="password" placeholder="Masukkan kata sandi" required>
                            </div>
                            <div class="col-12 d-flex justify-content-between align-items-center mt-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                    <label class="form-check-label text-muted small" for="remember">
                                        Ingat Saya
                                    </label>
                                </div>
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="text-muted small text-decoration-none">Lupa kata sandi?</a>
                                @else
                                    <a href="#" class="text-muted small text-decoration-none">Lupa kata sandi?</a>
                                @endif
                            </div>
                            <div class="col-12 mt-4">
                                {{-- Tombol dengan warna hijau gelap senada tema Archata --}}
                                <button class="btn w-100 py-3 text-white text-uppercase fw-bold shadow-sm" type="submit" style="background-color: #0f2a24; letter-spacing: 1px; border-radius: 4px;">Masuk</button>
                            </div>
                            <div class="col-12 text-center mt-3">
                                <p class="mb-0 text-muted small">Belum punya akun? <a href="#" class="text-dark fw-bold text-decoration-underline">Daftar</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
