@extends('layouts.app')

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
                                    <p class="form-control-plaintext">Rp. {{ number_format($item->event->price) }},-</p>
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
                                <label class="col-6 col-sm-2 col-form-label font-weight-bold d-flex">Informasi <span class="ml-auto">:</span></label>
                                <div class="col">
                                    <p class="form-control-plaintext">
                                        {!! $item->event->description !!}
                                    </p>
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
