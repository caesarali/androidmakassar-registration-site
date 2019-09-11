@extends('layouts.admin')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark display-4">Promo</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('promo.index') }}">Promo</a></li>
                    <li class="breadcrumb-item active">{{ $promo->code }}</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">Edit Promo</div>
            <form action="{{ route('promo.update', $promo->id) }}" method="POST">
                @csrf @method('patch')
                <div class="card-body">
                    @include('pages.admin.promo._form')
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-check mr-1"></i> Update Promo
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
