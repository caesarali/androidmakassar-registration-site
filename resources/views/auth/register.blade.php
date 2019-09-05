@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header border-bottom-0 text-center text-uppercase font-weight-bold">REGISTRASI</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="city_id" class="col-md-3 col-form-label text-md-right">Kota <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <select v-model="city" name="city_id" id="city_id" class="form-control @error('city_id') is-invalid @enderror" required>
                                    <option value="" hidden>Pilih kota:</option>
                                    @foreach ($cities as $item)
                                        <option value="{{ $item->id }}" {{ old('city_id') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('city_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="event_id" class="col-md-3 col-form-label text-md-right">Kursus <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <select name="event_id" id="event_id" class="form-control @error('event_id') is-invalid @enderror" required>
                                    <option value="" hidden>Pilih kursus:</option>
                                    <option v-for="item in events" :value="item.id">@{{ item.name }}</option>
                                    <option v-if="city != '' && !events.length" value="" disabled>Kursus belum tersedia.</option>
                                </select>
                                @error('event_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-md-right">Nama <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" aria-describedby="nameHelpBlock" placeholder="Nama lengkap.">
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
                            <div class="col-md-8">
                                <div class="custom-control custom-radio custom-control-inline mt-0 mt-md-2">
                                    <input type="radio" id="option1" name="gender" class="custom-control-input" value="L" checked>
                                    <label class="custom-control-label" for="option1">Pria</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="option2" name="gender" class="custom-control-input" value="P">
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
                            <div class="col-md-8">
                                <input id="birth_date" type="date" class="form-control @error('birth_date') is-invalid @enderror" name="birth_date" value="{{ old('birth_date') }}" required autocomplete="birth_date">
                                @error('birth_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-right">Email <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-3 col-form-label text-md-right">No. HP (Whatsapp) <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-3 col-form-label text-md-right">Alamat <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <textarea name="address" rows="5" id="address" class="form-control @error('address') is-invalid @enderror" required>{{ old('address') }}</textarea>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-3">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    new Vue({
        el: '#app',
        data() {
            return {
                city: '{{ old("city_id") }}',
                events: []
            }
        },
        watch: {
            city(value) {
                if (value) {
                    this.getEvents(value)
                }
            }
        },
        methods: {
            getEvents(city) {
                this.events = []
                axios.get('/api/events/' + city)
                .then(({ data }) => {
                    this.events = data
                })
            }
        }
    })
</script>
@endsection
