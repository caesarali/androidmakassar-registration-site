@extends('layouts.app')

@section('title', 'Profile Setting')

@section('breadcrumb')
<ol class="breadcrumb">
    <li class="mr-auto d-none d-md-inline">
        <h5 class="m-0">Profile Setting</h5>
    </li>
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Profile Setting</li>
</ol>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2">
            <img src="{{ $gravatar }}" alt="{{ $profile->name }}" class="img-fluid rounded mx-auto d-block">
            <div class="my-3 text-center">
                <h3 class="lead mb-1">{{ $profile->name }}</h3>
                <p>{{ '@' . $profile->user->username }}</p>
            </div>
        </div>
        <div class="col-md">
            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                <div class="form-group row">
                    <label for="name" class="col-md-3 col-form-label text-md-right">Nama <span class="text-danger">*</span></label>
                    <div class="col-md-5">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $profile->name) }}" required autocomplete="name" aria-describedby="nameHelpBlock" placeholder="Nama lengkap.">
                        <small id="nameHelpBlock" class="form-text text-muted">
                            Nama ini akan digunakan pada sertifikasi.
                        </small>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="gender" class="col-md-3 col-form-label text-md-right">Gender <span class="text-danger">*</span></label>
                    <div class="col-md-5">
                        <div class="custom-control custom-radio custom-control-inline mt-0 mt-md-2">
                            <input type="radio" id="option1" name="gender" class="custom-control-input" value="L" {{ $profile->gender == 'L' ? 'checked' : '' }}>
                            <label class="custom-control-label" for="option1">Pria</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="option2" name="gender" class="custom-control-input" value="P" {{ $profile->gender == 'P' ? 'checked' : '' }}>
                            <label class="custom-control-label" for="option2">Wanita</label>
                        </div>
                        @error('gender')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="birth_date" class="col-md-3 col-form-label text-md-right">Tanggal Lahir <span class="text-danger">*</span></label>
                    <div class="col-md-5">
                        <input id="birth_date" type="date" class="form-control @error('birth_date') is-invalid @enderror" name="birth_date" value="{{ old('birth_date', $profile->birth_date) }}" required autocomplete="birth_date">
                        @error('birth_date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-3 col-form-label text-md-right">Email <span class="text-danger">*</span></label>
                    <div class="col-md-5">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $profile->email) }}" required autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="phone" class="col-md-3 col-form-label text-md-right">No. HP (Whatsapp) <span class="text-danger">*</span></label>
                    <div class="col-md-5">
                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone', $profile->phone) }}" required autocomplete="phone">
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="address" class="col-md-3 col-form-label text-md-right">Alamat <span class="text-danger">*</span></label>
                    <div class="col-md">
                        <textarea name="address" rows="5" id="address" class="form-control @error('address') is-invalid @enderror" required>{{ old('address', $profile->address) }}</textarea>
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <div class="col-md offset-md-3">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Update') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
