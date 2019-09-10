@extends('layouts.app')

@section('title', 'Username & Password Setting')

@section('breadcrumb')
<ol class="breadcrumb">
    <li class="mr-auto d-none d-md-inline">
        <h5 class="m-0">Username & Password</h5>
    </li>
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Username & Password</li>
</ol>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <form action="{{ route('account.update') }}" autocomplete="off" method="POST">
                @csrf
                <div class="form-group">
                    <label for="username">New Username <span class="text-danger">*</span></label>
                    <input id="username" autocomplete="off" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username', $user->username) }}" required placeholder="New username">
                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">New Password <span class="text-danger">*</span></label>
                    <input id="password" autocomplete="false" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" placeholder="New password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Password Confirmation <span class="text-danger">*</span></label>
                    <input id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="Password Confirmation">
                    @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <hr>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Update') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
