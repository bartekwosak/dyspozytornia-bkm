<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/buttons/1.5.1/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/responsive/2.2.1/css/dataTables.responsive.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
    <link href="https://unpkg.com/basscss@7.1.1/css/basscss.min.css" rel="stylesheet">
    <link href="{{URL::asset('css/app.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/style.css')}}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <a class="navbar-brand" href="/">
        <span class="badge badge-secondary py-0 px-0 my-0 mx-0">
                <img src="/images/logo.png" alt="logo_bkm">
        </span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        @if(Auth::check())
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{ Request::is(['track','track/*'])? 'active': '' }}">
                    <a class="nav-link" href="{{(idate("w")==0)? route('track.show',7) : route('track.show',idate("w")) }}">
                        Grafik tygodniowy</a>
                </li>
                <li class="nav-item {{ Request::is(['brigade','brigade/*'])? 'active': '' }}">
                    <a class="nav-link" href={{route('brigade.index')}}>Wykaz brygad</a>
                </li>
                <li class="nav-item {{ Request::is(['driver','driver/*'])? 'active': '' }}">
                    <a class="nav-link" href="{{route('driver.index')}}">Wykaz kierowców</a>
                </li>
                <li class="nav-item" style="display: none">
                    <a class="nav-link" href="#">Wykaz autobusów</a>
                </li>
            </ul>
        @endif

        @if(Auth::check())
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <a id="log-master" class="nav-link" href='#'>Zalogowano jako: </a>
                </li>
            </ul>
            <div class="btn-group">
                <button type="button" class="btn btn-secondary dropdown-toggle mr-5" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                    {{Auth::user()->name}}
                </button>
                <div class="dropdown-menu dropdown-menu-right mt-2">
                    <a class="dropdown-item btn btn-light" href="#">Panel użytkownika</a>
                    <a class="dropdown-item btn btn-light hover" href="#">Panel administratora</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item btn btn-light text-danger font-weight-bold hover" href="/logout">Wyloguj</a>
                </div>
            </div>
        @endif
    </div>
</nav>

@yield('jumbotron')

<div class="container">

    @yield('content')

</div>

<footer class="footer bg-dark fixed-bottom">
    <div class="container">
        <p class="footer-block text-light text-center">2018 &copy; Copyright: Bartłomiej Osak</p>
    </div>
</footer>

@include('scripts.scriptpages')

</body>
</html>
