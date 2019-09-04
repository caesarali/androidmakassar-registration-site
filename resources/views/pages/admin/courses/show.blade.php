@extends('layouts.admin')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Registration</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('courses.index') }}">Courses</a></li>
                    <li class="breadcrumb-item active">{{ $courses->name }}</li>
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
                        <input type="text" id="keyword" name="q" placeholder="Search" aria-label="Search" class="form-control form-control-navbar border-0 shadow-none">
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
                    <a href="#" class="btn btn-success app-shadow">
                        Export
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
                    </div>

                    <div class="card-body p-0 table-responsive">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th width="1%" class="pr-0"></th>
                                    <th class="text-uppercase">Code Reg.</th>
                                    <th class="text-uppercase">Date</th>
                                    <th class="text-uppercase">Name</th>
                                    <th class="text-uppercase">Email</th>
                                    <th class="text-uppercase">Phone</th>
                                    <th class="text-uppercase text-center">Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($registrations as $item)
                                    <tr>
                                        <td class="pr-0">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="{{ $item->id }}">
                                                <label class="custom-control-label" for="{{ $item->id }}"></label>
                                            </div>
                                        </td>
                                        <td>{{ $item->code }}</td>
                                        <td>{{ $item->created_at->format('d/m/Y') }}</td>
                                        <td>{{ $item->participant->name }}</td>
                                        <td>{{ $item->participant->email }}</td>
                                        <td>{{ $item->participant->phone }}</td>
                                        <td class="text-center">
                                            @if ($item->status)
                                                <span class="badge badge-success">Done</span>
                                            @else
                                                <span class="badge badge-secondary">Unverified</span>
                                            @endif
                                        </td>
                                        <td class="text-right" nowrap>
                                            <a href="#" class="text-secondary text-decoration-none mx-2" v-on:click="showPaymentDetail('{{ $item->code }}')">
                                                <i class="far fa-check-square"></i>
                                            </a>
                                            <a href="#" class="text-secondary mx-2 text-decoration-none">
                                                <i class="far fa-user"></i>
                                            </a>
                                            <form action="#" method="POST" class="d-inline">
                                                @csrf @method('delete')
                                                <a href="#" class="text-secondary text-decoration-none ml-2" onclick="destroy(this)">
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

@include('pages.admin.courses._payment')
@endsection

@section('scripts')
<script>
    new Vue({
        el: '#app',
        data() {
            return {
                payment: {},
            }
        },
        methods: {
            showPaymentDetail(code) {
                axios.get('/api/registrations/' + code)
                .then(({ data }) => {
                    this.payment = data
                    $('#paymentModal').modal('show')
                })
            }
        }
    })
</script>
@endsection
