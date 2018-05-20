@extends('layouts.master')

@section('title')
    Dyspozytornia BKM
@endsection

@section('jumbotron')
    <div class="jumbotron text-center mb-2">
        <header class="h1">Dyspozytornia BKM</header><br>
        <p>Aplikacja wspomagająca zarządzanie dyspozytornią Białostockiej Komunikacji Miejskiej</p>
    </div>
@stop

@section('content')
    <p class="display-4">Witaj w systemie dyspozytorni!</p>
    <p class="lead">Obsługiwane spółki miejskie:</p>
    <div class="row">
        <div class="col-xs-6 col-md-4 mb-0">
            <div class="card h-100">
                <img class="card-img-top" src="images/kzk.jpg" alt="">
                <div class="card-body">
                    <h4 class="card-title">KZK</h4>
                    <p class="card-text">Komunalny Zakład Komunikacji w Białymstoku</p>
                </div>
                <div class="card-footer">
                    <a href="http://www.kzk.pl/" class="btn btn-primary">Odwiedź stronę!</a>
                </div>
            </div>
        </div>

        <div class="col-xs-6 col-md-4 mb-0">
            <div class="card h-100">
                <img class="card-img-top" src="images/kpkm.jpg" alt="">
                <div class="card-body">
                    <h4 class="card-title">KPKM</h4>
                    <p class="card-text">Komunalne Przedsiębiorstwo Komunikacji Miejskiej w Białymstoku</p>
                </div>
                <div class="card-footer">
                    <a href="http://www.kpkm.pl/" class="btn btn-primary">Odwiedź stronę!</a>
                </div>
            </div>
        </div>

        <div class="col-xs-6 col-md-4 mb-0">
            <div class="card h-100">
                <img class="card-img-top" src="images/kpk.jpg" alt="">
                <div class="card-body">
                    <h4 class="card-title">KPK</h4>
                    <p class="card-text">Komunalne Przedsiębiorstwo Komunikacji w Białymstoku</p>
                </div>
                <div class="card-footer">
                    <a href="http://www.kpk.bialystok.pl" class="btn btn-primary">Odwiedź stronę!</a>
                </div>
            </div>
        </div>
    </div>
@stop



