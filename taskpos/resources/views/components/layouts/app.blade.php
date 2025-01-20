<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts and Icons -->
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Latest compiled Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: #343a40 !important;
        }

        .navbar-brand, .nav-link {
            color: white !important;
        }

        .nav-link:hover {
            color: #ffc107 !important;
        }

        .sidebar {
            height: 100vh;
            background-color: #343a40;
            padding-top: 20px;
            color: white;
            position: fixed;
            width: 220px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .sidebar .nav-link {
            color: white !important;
            padding: 10px 20px;
        }

        .sidebar .nav-link.active {
            background-color: #495057;
            color: #ffc107 !important;
        }

        main {
            margin-left: 220px;
            padding: 20px;
            background-color: #f8f9fa;
            min-height: 100vh;
        }

        .btn-custom {
            margin-right: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div id="app">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark shadow">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <i class="bi bi-house-door"></i> {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-person-circle"></i> {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                    </li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Sidebar -->
        <div class="d-flex">
            <div class="sidebar">
                <nav class="nav flex-column">
                    <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                        <i class="bi bi-house"></i> Beranda
                    </a>
                    @if(Auth::user()->peran=='Admin')
                        <a href="{{ route('user') }}" class="nav-link {{ request()->routeIs('user') ? 'active' : '' }}">
                            <i class="bi bi-people"></i> Pengguna
                        </a>
                        <a href="{{ route('produk') }}" class="nav-link {{ request()->routeIs('produk') ? 'active' : '' }}">
                            <i class="bi bi-box"></i> Produk
                        </a>
                    @endif
                    <a href="{{ route('laporan') }}" class="nav-link {{ request()->routeIs('laporan') ? 'active' : '' }}">
                        <i class="bi bi-file-text"></i> Laporan
                    </a>
                    <a href="{{ route('transaksi') }}" class="nav-link {{ request()->routeIs('transaksi') ? 'active' : '' }}">
                        <i class="bi bi-currency-dollar"></i> Transaksi
                    </a>
                </nav>
            </div>

            <!-- Main Content -->
            <main>
                <div class="container">
                    <div class="row mb-4">
                        <div class="col-12">
                            @if (request()->routeIs('home'))
                                <h1 class="text-primary">Beranda</h1>
                            @elseif (request()->routeIs('user'))
                                <h1 class="text-primary">Pengguna</h1>
                            @elseif (request()->routeIs('produk'))
                                <h1 class="text-primary">Produk</h1>
                            @elseif (request()->routeIs('laporan'))
                                <h1 class="text-primary">Laporan</h1>
                            @elseif (request()->routeIs('transaksi'))
                                <h1 class="text-primary">Transaksi</h1>
                            @endif
                        </div>
                    </div>

                    {{$slot}}
                </div>
            </main>
        </div>
    </div>

    <!-- Latest compiled Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
