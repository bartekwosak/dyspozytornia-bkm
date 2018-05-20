@extends('layouts.master')

@section('title')
    Grafik: {{$weekDays[(Request::segment(2))-1]}}
@endsection

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
    @include('tracks.alerts')
    @include('date.modal')

    <div class="row mb-2">
        <div class="col-xl-7">
            <div class="card border border-primary mb-2">
                <div class="card-header text-light bg-primary border border-primary">
                    Wybór dnia
                </div>
                <div class="card-body text-center">
                    <div class="btn-group btn-group-justified mx-auto my-auto">
                        <button type="button" class="btn btn-primary"
                                onclick="window.location.href='{{route('track.show',1)}}'">Poniedziałek
                        </button>
                    </div>
                    <div class="btn-group btn-group-justified mx-auto my-auto">
                        <button type="button" class="btn btn-primary"
                                onclick="window.location.href='{{route('track.show',2)}}'">Wtorek
                        </button>
                    </div>
                    <div class="btn-group btn-group-justified mx-auto my-auto">
                        <button type="button" class="btn btn-primary"
                                onclick="window.location.href='{{route('track.show',3)}}'">Środa
                        </button>
                    </div>
                    <div class="btn-group btn-group-justified mx-auto my-auto">
                        <button type="button" class="btn btn-primary"
                                onclick="window.location.href='{{route('track.show',4)}}'">Czwartek
                        </button>
                    </div>
                    <div class="btn-group btn-group-justified mx-auto my-auto">
                        <button type="button" class="btn btn-primary"
                                onclick="window.location.href='{{route('track.show',5)}}'">Piątek
                        </button>
                    </div>
                    <div class="btn-group btn-group-justified mx-auto my-auto">
                        <button type="button" class="btn btn-primary"
                                onclick="window.location.href='{{route('track.show',6)}}'">Sobota
                        </button>
                    </div>
                    <div class="btn-group btn-group-justified mx-auto my-auto">
                        <button type="button" class="btn btn-primary"
                                onclick="window.location.href='{{route('track.show',7)}}'">Niedziela
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-5">
            <div class="card border border-warning">
                <div class="card-header text-light bg-warning border border-warning">
                    Narzędzia
                </div>
                <div class="card-body text-center">
                    @if($countBrigades == 0 && $countDrivers == 0 || ($countDrivers == 0 ) || ($countBrigades == 0))
                        <div class="btn-group btn-group-justified disabled mx-auto my-auto">
                            <button type="button" class="btn btn-primary ml-1 w-100 disabled"
                                    style="pointer-events: none"
                                    data-toggle="modal" disabled>
                                Dodaj kurs
                            </button>
                        </div>
                    @else
                        <div class="btn-group btn-group-justified mx-auto my-auto">
                            <button type="button" class="btn btn-primary ml-1 w-100" data-toggle="modal"
                                    data-target="#myModal">
                                Dodaj kurs
                            </button>
                        </div>
                    @endif
                    <div class="btn-group btn-group-justified mx-auto my-auto">
                        @if($countTracks == 0)
                            <button type="button" class="btn btn-info disabled w-100" style="pointer-events: none"
                                    data-toggle="modal"
                                    aria-disabled="true" disabled>
                                Archiwizuj grafik
                            </button>
                        @else
                            <button type="button" class="btn btn-info w-100" data-toggle="modal"
                                    data-target="#archive">
                                Archiwizuj grafik
                            </button>
                        @endif
                    </div>
                    <div class="btn-group btn-group-justified mx-auto my-auto">
                        @if($countTracks == 0)
                            <button type="button" class="btn btn-danger disabled w-100" style="pointer-events: none"
                                    data-toggle="modal"
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
                <div class="card-header bg-success border border-success text-light">
                    <span class="badge bg-secondary font-weight-bold"
                          style="font-size: 15px">{{$weekDays[(Request::segment(2))-1]}}</span>
                    <span class="badge bg-secondary font-weight-bold"
                          style="font-size: 15px">{{\Carbon\Carbon::parse($day->data)->format('d/m/Y')}}</span>
                    <button type="button" class="btn btn-danger btn-sm float-right font-weight-bold" data-toggle="modal"
                            data-target="#saveDate">
                        Określ datę
                    </button>
                </div>
                <div class="card-body">
                    <table id="trackTable" class="table-bordered table-hover dataTable" style="width:100%">
                        <thead>
                        <tr class="text-center">
                            <th style="width: 20%"></th>
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
                                <td class="text-center">
                                    <button type="button" class="btn btn-info text-white"
                                            data-numer_kierowcy="{{$track->driver->numer_sluzbowy}}"
                                            data-sluzba="{{$track->brigade->numer_brygady}}"
                                            data-nr_pojazdu="{{$track->nr_pojazdu}}"
                                            data-track_id="{{$track->id}}"
                                            data-toggle="modal"
                                            data-target="#edit">
                                        Modyfikuj
                                    </button>
                                    <button type="button" class="btn btn-danger"
                                            onclick="window.location.href='delete/{{$track->id}}'">
                                        Usuń
                                    </button>
                                </td>
                                <td>{{$track->driver->numer_sluzbowy}}</td>
                                <td>{{$track->brigade->numer_brygady}}</td>
                                <td>{{$track->brigade->godziny}}</td>
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
@stop
