@extends('layouts.master')

@section('jumbotron')

    <div class="jumbotron text-center mw-25">
        <header class="h1">Grafik kierowców tygodniowy</header>
        <br>
        <p>Poniżej znajduje się grafik 7-dniowy dla kierowców wszystkich spółek</p>
    </div>

@stop

@section('content')

    @include('errors.errorsform')
    @include('tracks.modal')

    <div class="row mb-2">
        <div class="col-xl-9">
            <div class="card border border-primary mb-2">
                <div class="card-header text-light bg-primary border border-primary">
                    Wybór dnia
                </div>
                <div class="card-body text-center">
                    <div class="btn-group btn-group-justified mx-auto my-auto">
                        <button type="button" class="btn btn-primary">Poniedziałek</button>
                    </div>
                    <div class="btn-group btn-group-justified mx-auto my-auto">
                        <button type="button" class="btn btn-primary">Wtorek</button>
                    </div>
                    <div class="btn-group btn-group-justified mx-auto my-auto">
                        <button type="button" class="btn btn-primary">Środa</button>
                    </div>
                    <div class="btn-group btn-group-justified mx-auto my-auto">
                        <button type="button" class="btn btn-primary">Czwartek</button>
                    </div>
                    <div class="btn-group btn-group-justified mx-auto my-auto">
                        <button type="button" class="btn btn-primary">Piątek</button>
                    </div>
                    <div class="btn-group btn-group-justified mx-auto my-auto">
                        <button type="button" class="btn btn-primary">Sobota</button>
                    </div>
                    <div class="btn-group btn-group-justified mx-auto my-auto">
                        <button type="button" class="btn btn-primary">Niedziela</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3">
            <div class="card border border-warning">
                <div class="card-header text-light bg-warning border border-warning">
                    Narzędzia
                </div>
                <div class="card-body">
                    <div class="btn-group btn-group-justified mx-auto my-auto">
                        <button type="button" class="btn btn-primary ml-1 w-100" data-toggle="modal"
                                data-target="#myModal">
                            Dodaj kurs
                        </button>
                    </div>
                    <div class="btn-group btn-group-justified mx-auto my-auto">
                        @if($countTracks == 0)
                            <button type="button" class="btn btn-danger disabled w-100" data-toggle="modal"
                                    aria-disabled="true" disabled>
                                Usuń grafik
                            </button>
                        @else
                            <button type="button" class="btn btn-danger w-100" data-toggle="modal"
                                    data-target="#deleteAll">
                                Usuń grafik
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card border border-success">
                <div class="card-header bg-success border border-success text-light">Poniedziałek</div>
                <div class="card-body">
                    <table id="myTable" class="table-bordered table-hover dataTable" style="width:100%">
                        <thead>
                        <tr class="text-center">
                            <th style="width: 17%"></th>
                            <th style="width: 17%">Nr. służbowy</th>
                            <th>Służba</th>
                            <th>Godziny pracy</th>
                            <th>Pojazd</th>
                            <th>Dyspozytor</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tracks as $track)
                            <tr>
                                <td>
                                    <button type="button" class="btn btn-info text-white"
                                            data-numer_kierowcy="{{$track->numer_kierowcy}}"
                                            data-sluzba="{{$track->sluzba}}"
                                            data-godz_pracy="{{$track->godz_pracy}}"
                                            data-nr_pojazdu="{{$track->nr_pojazdu}}" data-track_id="{{$track->id}}"
                                            data-toggle="modal"
                                            data-target="#edit">
                                        Modyfikuj
                                    </button>
                                    <button type="button" class="btn btn-danger"
                                            onclick="window.location.href='delete/{{$track->id}}'">
                                        Usuń
                                    </button>
                                </td>
                                <td>{{$track->numer_kierowcy}}</td>
                                <td>{{$track->sluzba}}</td>
                                <td>{{$track->godz_pracy}}</td>
                                <td>{{$track->nr_pojazdu}}</td>
                                <td>{{$track->user->name}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>

@stop
