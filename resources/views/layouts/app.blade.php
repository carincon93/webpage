<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}" defer></script>
    <script src="{{ asset('js/main.js') }}" defer></script>


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav m-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="/">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('informacionEmpresa', 'mision') }}">Misión</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('informacionEmpresa', 'vision') }}">Visión</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Servicios
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                @foreach ($servicios as $key => $servicio)
                                    <a class="dropdown-item" href="{{ route('servicio', $servicio->slug) }}">{{ $servicio->titulo}}</a>
                                @endforeach
                            </div>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}"><i class="far fa-user-circle"></i></a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}"><i class="fas fa-sign-in-alt"></i></a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/panel">Panel de administración</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar sesión') }}
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

        <main>
            @yield('content')
        </main>
    </div>
    <footer class="p-5">
        <div class="container">
            <h3 class="text-md-left mb-5">Mi sitio</h3>
            <div class="row">
                <div class="col-md-4">
                    <p class="text-justify">
                        @empty (!$informacion)
                            {{ $informacion->tipoInformacion == 'footer_sitio' ? $informacion->descripcion : '' }}
                        @endempty
                    </p>
                </div>
                <div class="col-md-4">
                    <ul class="list-unstyled">
                        <li>
                            <a href="/">Inicio</a>
                        </li>
                        <li>
                            <a href="{{ route('informacionEmpresa', 'mision') }}">Misión</a>
                        </li>
                        <li>
                            <a href="{{ route('informacionEmpresa', 'vision') }}">Visión</a>
                        </li>
                        @foreach ($servicios as $key => $servicio)
                            <li>
                                <a href="{{ route('servicio', $servicio->slug) }}">{{ $servicio->titulo }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Redes sociales</h5>
                    <ul class="list-unstyled">
                        <li>
                            <a href="#"><i class="fab fa-facebook-f mr-1"></i> /{{ config('app.name', 'Laravel') }}</a>
                        </li>
                        <li>
                            <a href="#"><i class="fab fa-instagram mr-1"></i> /{{ config('app.name', 'Laravel') }}</a>
                        </li>
                        <li>
                            <a href="#"><i class="fab fa-twitter mr-1"></i> /{{ config('app.name', 'Laravel') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
            <p class="text-black-50"><small>Derechos de autor {{ date('Y') }}</small></p>
        </div>
    </footer>
</body>
</html>
