@php

@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .waves {
            position: fixed;
            top: 0;
            right: 0;
        }
    </style>
</head>
<body @auth style="background-color: #fff;" @endauth>
    <div id="app">
        <nav class="header-top py-2 d-none d-md-block">
            <div class="container">
                <div class="row">
                    <div class="col-auto">
                        Makassar, Indonesia
                    </div>
                    <div class="col-auto pl-4">
                        (+62) 823 4749 1087
                    </div>
                    <div class="col-auto pl-4">
                        cs@androidmakassar.com
                    </div>
                </div>
            </div>
        </nav>
        @if (!request()->route()->named('verification.notice'))
            <nav class="navbar navbar-expand-md navbar-light bg-white @guest shadow-sm @endguest">
                <div class="container">
                    <a class="navbar-brand py-3" href="{{ url('/') }}">
                        <img src="https://androidmakassar.com/wp-content/uploads/2019/08/anro-6.png" alt="Android Makassar">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('profile.index') }}">
                                            <i class="fas fa-cog fa-fw mr-1"></i> Profile
                                        </a>
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fas fa-sign-out-alt fa-fw mr-1"></i> {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        @endif
        @auth
            <nav aria-label="breadcrumb" style="background-color: #fafafa;">
                <div class="container pl-0">
                    @yield('breadcrumb')
                </div>
            </nav>
        @endauth
        <main class="py-4">
            @yield('content')
        </main>
    </div>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
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
