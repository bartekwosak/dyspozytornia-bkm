@extends('layouts.master')

@section('jumbotron')

    <div class="jumbotron text-center mw-25">
        <header class="h1">Wykaz brygad BKM</header>
        <br>
        <p>Poniżej znajduje się wykaz brygad realizowanych w ramach sieci BKM</p>
    </div>

@stop

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

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Dodaj brygadę</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{route('brigade.store')}}" method="post">
                    {{csrf_field()}}
                    <div class="modal-body">
                        @include('brigades.form')
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Anuluj</button>
                        <button type="submit" class="btn btn-primary">Dodaj</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="deleteAll" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Usuń wykaz</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Czy na pewno chcesz usunąć cały wykaz brygad?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuluj</button>
                    <button type="button" class="btn btn-danger" onclick="window.location.href='/deleteAllBrigades'">Usuń wykaz
                    </button>
                </div>
            </div>
        </div>
    </div>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
        Dodaj brygadę
    </button>
    @if($countBrigades == 0)
        <button type="button" class="btn btn-danger disabled" data-toggle="modal" aria-disabled="true" disabled>
            Usuń wykaz
        </button>
    @else
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteAll">
            Usuń wykaz
        </button>
    @endif
    <br><br>

    <div class="table-responsive">
        <div class="card">
            <div class="card-header">
                Wykaz brygad
            </div>
            <div class="card-body">
                <table id="myTable" class="table table-bordered table-hover dataTable" style="width:100%">
                    <thead>
                    <tr class="text-center">
                        <th></th>
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
                                        onclick="window.location.href='delete/{{$brigade->id}}'">
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
@stop
