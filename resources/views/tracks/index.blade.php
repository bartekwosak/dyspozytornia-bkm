@extends('layouts.master')

@section('jumbotron')

    <div class="jumbotron text-center mw-25">
        <header class="h1">Grafik kierowców tygodniowy</header>
        <br>
        <p>Poniżej znajduje się grafik 7-dniowy dla kierowców wszystkich spółek</p>
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
                    <h4 class="modal-title" id="myModalLabel">Dodaj kurs</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{route('track.store')}}" method="post">
                    {{csrf_field()}}
                    <div class="modal-body">
                        @include('tracks.form')
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Anuluj</button>
                        <button type="submit" class="btn btn-primary">Dodaj</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Edytuj</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{route('track.update','GrafikTygodniowy')}}" method="post">
                    {{method_field('patch')}}
                    {{csrf_field()}}
                    <div class="modal-body">
                        <input type="hidden" name="track_id" id="track_id" value="">
                        @include('tracks.form')
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Anuluj</button>
                        <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="deleteAll" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Usuń grafik</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Czy na pewno chcesz usunąć cały grafik?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuluj</button>
                    <button type="button" class="btn btn-danger" onclick="window.location.href='/deleteAll'">Usuń grafik
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <ul class="pagination">
            <li class="page-item active">
                <a class="page-link" href="/GrafikTygodniowy">Poniedziałek</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="/GrafikTygodniowy">Wtorek</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="/GrafikTygodniowy">Środa</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="/GrafikTygodniowy">Czwartek</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="/GrafikTygodniowy">Piątek</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="/GrafikTygodniowy">Sobota</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="/GrafikTygodniowy">Niedziela</a>
            </li>
        </ul>
    </div>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
        Dodaj kurs
    </button>
    @if($countTracks == 0)
        <button type="button" class="btn btn-danger disabled" data-toggle="modal" aria-disabled="true" disabled>
            Usuń grafik
        </button>
    @else
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteAll">
            Usuń grafik
        </button>
    @endif
    <br><br>

    <div class="table-responsive">
        <div class="card">
            <div class="card-header bg-light">Poniedziałek</div>
            <div class="card-body">
                <table id="myTable" class="table-xl table-bordered table-hover dataTable" style="width:100%">
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
                                        data-sluzba="{{$track->sluzba}}" data-godz_pracy="{{$track->godz_pracy}}"
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
@stop
