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
                    <li class="breadcrumb-item active">Promo</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col">
                <form class="form-inline" action="{{ url()->current() }}">
                    <div class="input-group app-shadow">
                        <input type="text" id="keyword" name="q" placeholder="Search" aria-label="Search" class="form-control form-control-navbar border-0 shadow-none" value="{{ $request->q }}">
                        <div class="input-group-append">
                            <div class="input-group-text bg-white border-0">
                                <i class="fa fa-search"></i>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-auto">
                <div class="btn-group" role="group" aria-label="Action Button">
                    <a href="{{ route('promo.create') }}" class="btn btn-primary app-shadow">
                        Create Promo
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <div class="custom-control custom-checkbox mr-auto">
                            <input type="checkbox" class="custom-control-input" id="checkAll">
                            <label class="custom-control-label" for="checkAll"></label>
                        </div>

                        <div class="dropdown mr-1">
                            <button class="btn btn-light btn-sm dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-filter mr-2"></i>
                            </button>
                        </div>

                    </div>
                    <div class="card-body p-0 table-responsive">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th width="1%" class="pr-0"></th>
                                    <th class="text-uppercase">Code</th>
                                    <th class="text-uppercase">Period</th>
                                    <th class="text-uppercase text-center">Discount</th>
                                    <th class="text-uppercase text-center">Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($promo as $item)
                                    <tr>
                                        <td class="pr-0">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="{{ $item->id }}">
                                                <label class="custom-control-label" for="{{ $item->id }}"></label>
                                            </div>
                                        </td>
                                        <td><b>{{ $item->code }}</b> | {{ $item->event->name }}</td>
                                        <td>{{ $item->from_date->format('d/m/Y') }} - {{ $item->to_date->format('d/m/Y') }}</td>
                                        <td class="text-center">
                                            <span class="badge badge-warning">{{ $item->discount }}% <i class="fas fa-tag ml-1"></i></span>
                                        </td>
                                        <td class="text-center">
                                            @if ($item->is_valid)
                                                <span class="badge badge-success">VALID</span>
                                            @else
                                                <span class="badge badge-secondary">CLOSED</span>
                                            @endif
                                        </td>
                                        <td class="text-right">
                                            <a href="{{ route('promo.edit', $item->id) }}" class="text-secondary text-decoration-none mx-2">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            <form action="{{ route('promo.destroy', $item->id) }}" method="POST" class="d-inline">
                                                @csrf @method('delete')
                                                <a href="{{ route('promo.destroy', $item->id) }}" class="text-secondary text-decoration-none ml-2" onclick="destroy(this)">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
