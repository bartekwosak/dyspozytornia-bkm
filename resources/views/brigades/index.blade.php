@extends('layouts.master')

@section('jumbotron')

    <div class="jumbotron text-center mw-25">
        <header class="h1">Wykaz brygad BKM</header>
        <br>
        <p>Poniżej znajduje się wykaz brygad realizowanych w ramach sieci BKM</p>
    </div>

@stop

@section('content')

    @include('errors.errorsform')
    @include('brigades.modal')

    <div class="row mb-2">
        <div class="col-xl-8">
            <div class="card border border-primary mb-2">
                <div class="card-header text-light bg-primary border border-primary">
                    Wybór kategorii brygady
                </div>
                <div class="card-body text-center">
                    <div class="btn-group btn-group-justified mx-auto my-auto">
                        <button type="button" class="btn btn-primary">Dzień roboczy</button>
                    </div>
                    <div class="btn-group btn-group-justified mx-auto my-auto">
                        <button type="button" class="btn btn-primary">Sobota</button>
                    </div>
                    <div class="btn-group btn-group-justified mx-auto my-auto">
                        <button type="button" class="btn btn-primary">Niedziela i Święta</button>
                    </div>
                    <div class="btn-group btn-group-justified mx-auto my-auto">
                        <button type="button" class="btn btn-primary">Inne</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card border border-warning">
                <div class="card-header text-light bg-warning border border-warning">
                    Narzędzia
                </div>
                <div class="card-body text-center">
                    <div class="btn-group btn-group-justified mx-auto my-auto">
                        <button type="button" class="btn btn-primary ml-1 w-100" data-toggle="modal"
                                data-target="#myModal">
                            Dodaj brygadę
                        </button>
                    </div>
                    <div class="btn-group btn-group-justified mx-auto my-auto">
                        @if($countBrigades == 0)
                            <button type="button" class="btn btn-danger disabled w-100" data-toggle="modal"
                                    aria-disabled="true" disabled>
                                Usuń wykaz
                            </button>
                        @else
                            <button type="button" class="btn btn-danger w-100" data-toggle="modal"
                                    data-target="#deleteAll">
                                Usuń wykaz
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
                    Wykaz brygad
                </div>
                <div class="card-body">
                    <table id="brigadeTable" class="table table-bordered table-hover dataTable">
                        <thead>
                        <tr class="text-center">
                            <th style="width: 18%"></th>
                            <th>Brygada</th>
                            <th>Typ dnia</th>
                            <th>Godziny pracy</th>
                            <th>Miejsce zmiany</th>
                            <th>Typ autobusu</th>
                            <th>Spółka</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($brigades as $brigade)
                            <tr>
                                <td>
                                    <button type="button" class="btn btn-success"
                                            onclick="window.location.href='{{route('brigade.show',$brigade->id)}}'">
                                        Szczegóły
                                    </button>
                                    <button type="button" class="btn btn-danger"
                                            onclick="window.location.href='deleteBrigade/{{$brigade->id}}'">
                                        Usuń
                                    </button>
                                </td>
                                <td>{{$brigade->numer_brygady}}</td>
                                <td>{{$brigade->rodzaj_dnia}}</td>
                                <td>{{$brigade->godziny}}</td>
                                <td>{{$brigade->miejsce_zmiany}}</td>
                                <td>{{$brigade->przydzial}}</td>
                                <td>{{$brigade->spolka}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



@stop
