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

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
</head>
<body style="background-color:#082032; color:white;">
    <div id="app" class="container" style="max-width:1000px;">
        <header style="color:white; padding:30px; text-align:center;">
            <h1>Miftah's Book Store</h1>
            <h5>-Books are the window to the world-</h5>
        </header>

        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #334756">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                 <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}" style="background-color: #FF4C29">
                      <span class="navbar-toggler-icon"></span>
                 </button>
                 <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="daftarbuku">Daftar Buku</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="daftarpenjualan">Daftar Penjualan</a>
                        </li>
                        
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown" style="background-color: #2C394B; font-weight:bold; color: white; border: 1px solid #2C394B;">
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" style="color:white;" data-bs-target="#ModalLogout">Logout</a>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
       </nav>

        @include('layouts.logout')
        <main class="py-4">
            @yield('content')
        </main>
        <footer style="text-align:center; padding:8px; background-color: #334756;">
            <p>© 2021 Miftahul Ulyana Hutabarat</p>
       </footer>
    </div>
</body>
<script type="text/javascript" src="js/bootstrap.js"></script>
</html>
