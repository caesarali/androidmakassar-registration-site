@extends('layouts.app')

@section('title', 'Home')

@section('breadcrumb')
<ol class="breadcrumb">
    <li class="mr-auto">
        <h5 class="m-0">Android Makassar</h5>
    </li>
    <li class="breadcrumb-item active" aria-current="page">Home</li>
</ol>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="now-tab" data-toggle="tab" href="#now" role="tab" aria-controls="now" aria-selected="true">Saat ini</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="history-tab" data-toggle="tab" href="#history" role="tab" aria-controls="history" aria-selected="false">Riwayat</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="now" role="tabpanel" aria-labelledby="now-tab">
                    @foreach ($registrations as $item)
                        <div class="py-3 border-bottom">
                            <h5>
                                <a href="#"># {{ $item->event->name }} - {{ $item->event->city->name }}</a>
                            </h5>
                            <div class="form-row">
                                <label class="col-6 col-sm-2 col-form-label font-weight-bold d-flex">Tanggal Registrasi <span class="ml-auto">:</span></label>
                                <div class="col">
                                    <p class="form-control-plaintext">{{ $item->created_at->format('d/m/Y') }}</p>
                                </div>
                            </div>
                            <div class="form-row">
                                <label class="col-6 col-sm-2 col-form-label font-weight-bold d-flex">Kode Registrasi <span class="ml-auto">:</span></label>
                                <div class="col">
                                    <p class="form-control-plaintext">{{ $item->code }}</p>
                                </div>
                            </div>
                            <div class="form-row">
                                <label class="col-6 col-sm-2 col-form-label font-weight-bold d-flex">Biaya <span class="ml-auto">:</span></label>
                                <div class="col">
                                    <p class="form-control-plaintext">
                                        {{-- @if ($item->event->have_promo)
                                            <del class="text-muted font-italic">Rp. {{ number_format($item->event->getOriginal('price'), 0,',','.') }}</del>
                                        @endif --}}
                                        Rp. {{ number_format($item->paybill, 0,',','.') }},-
                                        {{-- @if ($item->event->have_promo)
                                            <span class="badge badge-warning ml-1">Potongan {{ $item->event->promo->sum('discount') }}%</span>
                                        @endif --}}
                                    </p>
                                </div>
                            </div>
                            <div class="form-row">
                                <label class="col-6 col-sm-2 col-form-label font-weight-bold d-flex">Jadwal <span class="ml-auto">:</span></label>
                                <div class="col">
                                    <p class="form-control-plaintext">{{ $item->schedule->name }} <br> <small>{{ $item->schedule->description }}</small></p>
                                </div>
                            </div>
                            <div class="form-row">
                                <label class="col-6 col-sm-2 col-form-label font-weight-bold d-flex">Status <span class="ml-auto">:</span></label>
                                <div class="col">
                                    <p class="form-control-plaintext">
                                        @if ($item->status == 2)
                                            <span class="badge badge-success">LUNAS</span>
                                        @elseif ($item->status == 1)
                                            <span class="badge badge-warning">Menunggu Verifikasi</span>
                                            <a href="{{ route('receipt.form', $item->code) }}" class="text-decoration-none">
                                                <small class="text-muted">(Bukti Pembayaran)</small>
                                            </a>
                                        @else
                                            <span class="badge badge-secondary">Pending</span> |
                                            <a href="{{ route('receipt.form', $item->code) }}" class="text-decoration-none">
                                                <small class="text-muted font-italic">(Upload bukti pembayaran)</small>
                                            </a>
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <div class="form-row">
                                <label class="col-6 col-sm-2 col-form-label font-weight-bold d-flex">Deskripsi Kursus <span class="ml-auto">:</span></label>
                                <div class="col">
                                    <div class="form-control-plaintext pt-2">{!! $item->event->description !!}</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="history-tab">
                    <h4 class="my-3 text-center">Coming Soon....</h4>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
