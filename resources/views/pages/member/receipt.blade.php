@extends('layouts.app')

@section('title', 'Receipt')

@section('breadcrumb')
<ol class="breadcrumb">
    <li class="mr-auto d-none d-md-inline">
        <h5 class="m-0">Bukti Pembayaran</h5>
    </li>
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ $registration->event->name }}</li>
</ol>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="{{ route('receipt.save', $registration->code) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">A/N Rekening</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $registration->receipt->name ?? '') }}" placeholder="A/N Rekening" required>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="bank">Bank</label>
                    <input type="text" name="bank" id="bank" class="form-control @error('bank') is-invalid @enderror" value="{{ old('bank', $registration->receipt->bank ?? '') }}" placeholder="Nama Bank" required>
                    @error('bank')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="paid_at">Tanggal Transfer</label>
                    <input type="date" name="paid_at" id="paid_at" class="form-control @error('paid_at') is-invalid @enderror" value="{{ old('paid_at', $registration->receipt->paid_at ?? '') }}" placeholder="Tanggal Transfer sesuai dengan struk." required>
                    @error('paid_at')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="struk">Bukti Transfer <small class="text-muted">(JPG/PDF, maks: 2048 KB)</small></label>
                    <input id="struk" class="d-block @error('struk') form-control is-invalid @enderror" type="file" accept=".png,.jpeg,.jpg,.pdf" name="struk" value="{{ old('struk') }}" placeholder="Foto Bukti Pembayaran" {{ !$registration->receipt ? 'required' : '' }}>
                    @error('struk')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <hr>

                <div class="form-group text-right">
                    <a href="{{ route('home') }}" class="btn btn-light border">Kembali</a>
                    <button type="submit" class="btn btn-primary btn-block-xs"><i class="fas {{ $registration->receipt ? 'fa-check' : 'fa-upload' }} mr-1"></i> {{ $registration->receipt ? 'Update' : 'Upload' }}</button>
                </div>
            </form>
        </div>
        @if ($registration->receipt)
            <div class="col-md-3">
                <label for="struk-file">Bukti transfer</label>
                <img id="struk-file" class="img-fluid rounded" src="{{ asset($registration->receipt->file) }}" alt="{{ $registration->receipt->code }}">
            </div>
        @endif
    </div>
</div>
@endsection
