@extends('layouts.master')

@section('jumbotron')
    <div class="jumbotron text-center">
        <header class="h2">
            Szczegóły brygady:
            <div class="card bg-light text-success w-25 mx-auto mt-2">
                {{$brigade->numer_brygady}}<br>
            </div>
            @if($brigade->rodzaj_dnia == 'Dzień roboczy')
                <div id="jbt-sh-brig" class="card bg-light text-primary w-25 mx-auto">
                    Dzień powszedni
                </div>
            @elseif($brigade->rodzaj_dnia=='Sobota')
                <div id="jbt-sh-brig" class="card bg-light text-success w-25 mx-auto">
                    Sobota
                </div>
            @else
                <div id="jbt-sh-brig" class="card bg-light text-danger w-25 mx-auto">
                    Niedziela i Święta
                </div>
            @endif
        </header>
    </div>
@endsection
@section('content')

    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-xl-9 mb-3">
            <div class="card border border-success">
                <div class="card-header bg-success text-light">
                    Szczegóły
                </div>
                <div class="card-body">
                    <p class="text-success font-weight-bold mb-0">
                        Nazwa brygady:
                    </p>
                    <div class="card">
                        <div class="card-body">
                            {{$brigade->numer_brygady}}
                        </div>
                    </div>
                    <p class="text-success font-weight-bold mb-1 mt-3">
                        Rodzaj dnia:
                    </p>
                    <div class="card">
                        <div class="card-body">
                            {{$brigade->rodzaj_dnia}}
                        </div>
                    </div>
                    <p class="text-success font-weight-bold mb-1 mt-3">
                        Godziny pracy:
                    </p>
                    <div class="card">
                        <div class="card-body">
                            {{$brigade->godziny}}
                        </div>
                    </div>
                    <p class="text-success font-weight-bold mb-1 mt-3">
                        Miejsce zmiany/zakończenia:
                    </p>
                    <div class="card">
                        <div class="card-body">
                            {{$brigade->miejsce_zmiany}}
                        </div>
                    </div>
                    <p class="text-success font-weight-bold mb-1 mt-3">
                        Typ autobusu:
                    </p>
                    <div class="card">
                        <div class="card-body">
                            {{$brigade->przydzial}}
                        </div>
                    </div>
                    <p class="text-success font-weight-bold mb-1 mt-3">
                        Spółka obsługująca:
                    </p>
                    <div class="card w-25">
                        <div class="card-body">
                            @if($brigade->spolka=='KZK')
                                <img class="card-img-top" src="{{ URL::to('/') }}/images/kzk.jpg" alt="KZK">
                            @elseif($brigade->spolka=='KPKM')
                                <img class="card-img-top" src="{{ URL::to('/') }}/images/kpkm.jpg" alt="KPKM">
                            @else
                                <img class="card-img-top" src="{{ URL::to('/') }}/images/kpk.jpg" alt="KPK">
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3">
            <div class="card border border-warning ">
                <div class="card-header bg-warning text-light">
                    Panel edycji
                </div>
                <div class="card-body">
                    <button class="btn btn-primary btn-block">Edytuj</button>
                    <br>
                    <button class="btn btn-danger btn-block">Usuń</button>
                </div>
            </div>
            <div class="card border border-primary mt-3">
                <div class="card-header bg-primary text-light">
                    Informacje
                </div>
                <div class="card-body">
                    <p class="text-primary font-weight-bold m-0">
                        Utworzono:
                    </p>
                    <div class="card border-primary">
                        <div class="card-body">
                            {{$brigade->created_at}}
                        </div>
                    </div>
                    <div class="card mt-2 border-secondary">
                        <div class="card-body">
                            {{$brigade->user->name}}
                        </div>
                    </div>
                    <p class="text-primary font-weight-bold mt-3 mb-0">
                        Zmodyfikowano:
                    </p>
                    <div class="card border-primary">
                        <div class="card-body">
                            {{$brigade->updated_at}}
                        </div>
                    </div>
                    <div class="card mt-2 border-secondary">
                        <div class="card-body">
                            {{$brigade->user->name}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
