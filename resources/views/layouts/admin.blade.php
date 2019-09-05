<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} - Admin Panel</title>

    <link href="{{ asset('css/androidmakassar.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
    <div id="app" class="wrapper">
        @include('layouts._navbar')

        @include('layouts._sidebar')

        <div class="content-wrapper">
            @yield('content')
        </div>

        @include('layouts._footer')

        <aside class="control-sidebar control-sidebar-light">
            <div class="p-3">
                <img src="{{ asset('images/user-circle.png') }}" class="img-fluid mx-auto d-block rounded-circle" style="width: 75px">
                <div class="pt-2 text-center">
                    <h5 class="mb-0">{{ Auth::user()->name }}</h5>
                    <p>{{ Auth::user()->role->display_name }}</p>
                </div>
                <hr class="mt-0">
                <button class="btn btn-outline-secondary border-0 btn-block" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt mr-1"></i> Logout
                </button>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </aside>
    </div>

    <script src="{{ asset('js/androidmakassar.js') }}"></script>
    @yield('scripts')
    <script>
        function destroy(target) {
            event.preventDefault()
            $confirm.delete().then((result) => {
                if (result.value) {
                    $(target).parent().submit()
                }
            })
        }
    </script>
    @if (session('success'))
        <script>
            $toast.fire({
                type: 'success',
                title: '{{ session('success') }}'
            })
        </script>
    @endif
</body>
</html>
