@extends('layouts.admin')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Courses</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Courses</li>
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
                    <a href="{{ route('courses.create') }}" class="btn btn-primary app-shadow">
                        Create Courses
                    </a>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
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
                                    <th class="text-uppercase">Title</th>
                                    <th class="text-uppercase">Price</th>
                                    <th class="text-uppercase">Promo</th>
                                    <th class="text-uppercase">Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($courses as $item)
                                    <tr>
                                        <td class="pr-0">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="{{ $item->id }}">
                                                <label class="custom-control-label" for="{{ $item->id }}"></label>
                                            </div>
                                        </td>
                                        <td>
                                            {{ $item->name }} - <b>{{ $item->city->name }}</b>
                                            <br> <small class="text-muted">{{ $item->category->name }}</small>
                                        </td>
                                        <td nowrap>
                                            @if ($item->have_promo)
                                                <del class="text-muted mr-1">Rp. {{ number_format($item->getOriginal('price'), '0',',','.') }},-</del>
                                            @endif
                                            Rp. {{ number_format($item->price, '0',',','.') }},-
                                        </td>
                                        <td nowrap>{{ $item->have_promo ? 'Diskon ' . $item->promo->discount . '%' : '-' }}</td>
                                        <td>
                                            @if ($item->status)
                                                <span class="badge badge-success">Done</span>
                                            @else
                                                <span class="badge badge-primary">On Going</span>
                                            @endif
                                        </td>
                                        <td class="text-right" nowrap>
                                            <a href="{{ route('courses.show', $item->code) }}" class="text-secondary mx-2 text-decoration-none">
                                                <i class="far fa-user mr-1"></i> {{ $item->registrations->count() }}
                                            </a>
                                            <a href="{{ route('courses.edit', $item->code) }}" class="text-secondary text-decoration-none mx-2">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            <form action="{{ route('courses.destroy', $item->id) }}" method="POST" class="d-inline">
                                                @csrf @method('delete')
                                                <a href="{{ route('courses.destroy', $item->id) }}" class="text-secondary text-decoration-none ml-2" onclick="destroy(this)">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center text-muted font-italic" colspan="7">Empty...</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
