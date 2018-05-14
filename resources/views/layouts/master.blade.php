<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dyspozytornia BKM</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/responsive/2.2.1/css/dataTables.responsive.css">
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
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item {{ Request::is(['track','track/*'])? 'active': '' }}">
                <a class="nav-link" href={{route('track.index')}}>Grafik tygodniowy</a>
            </li>
            <li class="nav-item {{ Request::is(['brigade','brigade/*'])? 'active': '' }}">
                <a class="nav-link" href={{route('brigade.index')}}>Wykazy brygad</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Wykaz kierowców</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Wykaz autobusów</a>
            </li>
        </ul>

        @if(!Auth::check())
            <button type="submit" class="btn btn-info" onclick="window.location.href='/login'">ZALOGUJ</button>
        @else
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
                    <button class="dropdown-item btn btn-light" type="button">Panel użytkownika</button>
                    <button class="dropdown-item btn btn-light" type="button">Panel admina</button>
                    <button class="dropdown-item text-danger font-weight-bold btn btn-light" type="button"
                            onclick="window.location.href='/logout'">Wyloguj
                    </button>
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
