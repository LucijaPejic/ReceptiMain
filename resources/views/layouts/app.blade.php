<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('frontend/js/bootstrap/bootstrap.min.js')}}"></script>
        <script src="{{ asset('frontend/js/bootstrap/popper.min.js')}}"></script>
        <script src="{{ asset('frontend/js/bootstrap/jquery/jquery-2.2.4.min.js')}}"></script>
        <script src="{{ asset('frontend/js/bootstrap/plugins/plugins.js')}}"></script>
        <script src="{{ asset('frontend/js/active.js')}}"></script>

    <!-- Fonts -->

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.x/css/materialdesignicons.min.css"
     rel="stylesheet">
     

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>
    <div id="app">
        <v-app>
            <nav class="navbar navbar-expand-md navbar-light bg-white">
                <div class="container">
                    <a class="nav-brand" href="{{ url('/user') }}"><img src="/images/img/core-img/logo.png" alt=""></a>
                    
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav me-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            @if(Auth::check() && !Auth::user()->is_admin)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.naslovna') }}">Naslovnica</a>
                            </li>
                            <li>
                                <a class="nav-link" href="{{ route('user.recepti') }}">Recepti</a>
                            </li>
                             <li>
                                <a class="nav-link" href="{{ route('user.recepti.about') }}">O nama</a>
                            </li>
                            <li>
                                <a class="nav-link" href="{{route('user.recepti.kontakt') }}">Kontakt</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.recept.novi') }}">Dodaj Recept</a>
                            </li>
                            @endif

                            <!-- Authentication Links -->
                            @guest
                            @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Prijava') }}</a>
                            </li>
                            @endif

                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Registracija') }}</a>
                            </li>
                            @endif
                            @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>

            <main>
                @yield('content')
            </main>
        </v-app>
    </div>
</body>

</html>