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
        {{-- <div class="row mb-3">
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
                    <a href="#" class="btn btn-primary app-shadow">
                        Export
                    </a>
                </div>
            </div>
        </div> --}}
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <div class="custom-control custom-checkbox mr-auto">
                            <input type="checkbox" class="custom-control-input" id="checkAll">
                            <label class="custom-control-label" for="checkAll"></label>

                            <span class="badge badge-pill badge-secondary">{{ $registrations->where('status', 0)->count() }}</span>
                            <span class="badge badge-pill badge-warning">{{ $registrations->where('status', 1)->count() }}</span>
                            <span class="badge badge-pill badge-success">{{ $registrations->where('status', 2)->count() }}</span>
                        </div>

                        <form action="{{ url()->current() }}" class="ml-auto">
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-light border-light pr-0"><i class="fas fa-filter"></i></div>
                                </div>
                                <select name="schedule" class="form-control form-control-sm bg-light border-light" onchange="this.form.submit()">
                                    <option value="">Show All</option>
                                    <option value="1" {{ $request->schedule == 1 ? 'selected' : '' }}>Weekend</option>
                                    <option value="2" {{ $request->schedule == 2 ? 'selected' : '' }}>Weekday</option>
                                </select>
                            </div>
                        </form>
                    </div>

                    <div class="card-body p-0 table-responsive">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th width="1%" class="pr-0"></th>
                                    <th class="text-uppercase">Code</th>
                                    <th class="text-uppercase">Date</th>
                                    <th class="text-uppercase">Name</th>
                                    <th class="text-uppercase">Email</th>
                                    <th class="text-uppercase">Phone / WA</th>
                                    <th class="text-uppercase">Schedule</th>
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
                                        <td nowrap>{{ $item->code }}</td>
                                        <td nowrap>{{ $item->created_at->format('d/m/Y') }}</td>
                                        <td nowrap>{{ $item->participant->name }}</td>
                                        <td nowrap>{{ $item->participant->email }}</td>
                                        <td nowrap>{{ $item->participant->phone }}</td>
                                        <td nowrap>{{ $item->schedule->name }}</td>
                                        <td class="text-center">
                                            @if ($item->status == 2)
                                                <span class="badge badge-success"><i class="fas fa-check mr-1"></i> Done</span>
                                            @elseif ($item->status == 1)
                                                <span class="badge badge-warning">Need Verification</span>
                                            @else
                                                <span class="badge badge-secondary">Pending</span>
                                            @endif
                                        </td>
                                        <td class="text-right" nowrap>
                                            <a href="#" class="text-secondary text-decoration-none mx-2" v-on:click="showPaymentDetail('{{ $item->code }}', '{{ route('registrations.update', $item->id) }}')">
                                                <i class="far fa-check-square"></i>
                                            </a>
                                            <a href="#" class="text-secondary mx-2 text-decoration-none">
                                                <i class="far fa-user"></i>
                                            </a>
                                            <form action="{{ route('registrations.destroy', $item->id) }}" method="POST" class="d-inline">
                                                @csrf @method('delete')
                                                <a href="{{ route('registrations.destroy', $item->id) }}" class="text-secondary text-decoration-none ml-2" onclick="destroy(this)">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center text-muted font-italic" colspan="9">Empty...</td>
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
<light-box ref="lightbox"></light-box>
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
            showPaymentDetail(code, updateRoute) {
                axios.get('/api/registrations/' + code)
                .then(({ data }) => {
                    this.payment = data
                    $('#paymentModal').modal('show')
                    $('#paymentModal .modal-footer form').attr('action', updateRoute)
                })
            },
            showPhoto(src, ext=null) {
                let image = {
                    src: src,
                    ext: ext
                }
                this.$refs.lightbox.open(image)
            }
        }
    })
</script>
@endsection
