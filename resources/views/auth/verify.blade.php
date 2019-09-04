@extends('layouts.app')

@section('content')
<svg class="waves" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#0099ff" fill-opacity="1" d="M0,96L30,90.7C60,85,120,75,180,106.7C240,139,300,213,360,224C420,235,480,181,540,154.7C600,128,660,128,720,154.7C780,181,840,235,900,229.3C960,224,1020,160,1080,133.3C1140,107,1200,117,1260,117.3C1320,117,1380,107,1410,101.3L1440,96L1440,0L1410,0C1380,0,1320,0,1260,0C1200,0,1140,0,1080,0C1020,0,960,0,900,0C840,0,780,0,720,0C660,0,600,0,540,0C480,0,420,0,360,0C300,0,240,0,180,0C120,0,60,0,30,0L0,0Z"></path></svg>
<div class="container" style="height: 450px">
    <div class="row justify-content-center align-items-center h-100">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header border-bottom-0 text-center">
                    <h3 class="lead">{{ __('Verify Your Email Address') }}</h3>
                </div>

                <div class="card-body text-center">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    <p class="font-weight-bold">Terimakasih telah mendaftar kursus di Android Makassar.</p>
                    Sebelum melanjutkan, silakan periksa email kamu untuk melalukan verifikasi.
                    <br>
                    Jika kamu belum menerima email verifikasi, <a href="{{ route('verification.resend') }}">klik di sini untuk mengirim kembali</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
