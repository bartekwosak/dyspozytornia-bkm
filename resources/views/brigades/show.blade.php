@extends('layouts.master')

@section('title')
    Brygada: {{$brigade->numer_brygady}}
@endsection

@section('jumbotron')
    <div class="jumbotron text-center">
        <header class="h2 font-weight-bold">
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

    @include('errors.errorsform')
    @include('brigades.modal')
    @include('brigades.alerts')

    <div id="deleteShowItem" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Usuń brygadę</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Czy na pewno chcesz usunąć brygadę?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuluj</button>
                    <button type="button" class="btn btn-danger"
                            onclick="window.location.href='/brigade/deleteBrigade/{{$brigade->id}}'">Usuń
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-9 mb-3">
            <div class="card border border-success">
                <div class="card-header bg-success text-light">
                    Szczegóły
                </div>
                <div class="card-body">
                    <p class="text-success font-weight-bold mb-2">
                        Nazwa brygady:
                    </p>
                    <span class="badge bg-silver border border-success font-weight-bold w-100 mb-3 text-left p-3 text-secondary"
                          style="font-size: 19px">{{$brigade->numer_brygady}}</span>
                    <p class="text-success font-weight-bold mb-2">
                        Rodzaj dnia:
                    </p>
                    <span class="badge bg-silver border border-success font-weight-bold w-100 mb-3 text-left p-3 text-secondary"
                          style="font-size: 19px">{{$brigade->rodzaj_dnia}}</span>
                    <p class="text-success font-weight-bold mb-2">
                        Godziny pracy:
                    </p>
                    <span class="badge bg-silver border border-success font-weight-bold w-100 mb-3 text-left p-3 text-secondary"
                          style="font-size: 19px">{{$brigade->godziny}}</span>
                    <p class="text-success font-weight-bold mb-2">
                        Miejsce zmiany/zakończenia:
                    </p>
                    <span class="badge bg-silver border border-success font-weight-bold w-100 mb-3 text-left p-3 text-secondary"
                          style="font-size: 19px">{{$brigade->miejsce_zmiany}}</span>
                    <p class="text-success font-weight-bold mb-2">
                        Typ autobusu:
                    </p>
                    <span class="badge bg-silver border border-success font-weight-bold w-100 mb-3 text-left p-3 text-secondary"
                          style="font-size: 19px">{{$brigade->przydzial}}</span>
                    <p class="text-success font-weight-bold mb-2">
                        Spółka obsługująca:
                    </p>
                    <div class="card w-25">
                        <div class="card-body border border-success bg-silver">
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
                    <button type="button" class="btn btn-primary btn-block"
                            data-numer_brygady="{{$brigade->numer_brygady}}"
                            data-rodzaj_dnia="{{$brigade->rodzaj_dnia}}"
                            data-godziny="{{$brigade->godziny}}"
                            data-miejsce_zmiany="{{$brigade->miejsce_zmiany}}"
                            data-przydzial="{{$brigade->przydzial}}"
                            data-spolka="{{$brigade->spolka}}"
                            data-brigade_id="{{$brigade->id}}"
                            data-toggle="modal"
                            data-target="#editBrigade">
                        Modyfikuj
                    </button>
                    <br>
                    <button type="button" class="btn btn-danger w-100" data-toggle="modal"
                            data-target="#deleteShowItem">
                        Usuń
                    </button>
                </div>
            </div>
            <div class="card border border-primary mt-3 mb-3 flex-lg-column">
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
    <div class="row">
        <div class="col-xl-12 mb-3">
            <div class="card border border-info">
                <div class="card-header bg-info text-light">
                    Użycie w grafiku:
                </div>
                <div class="card-body text-center">
                    @foreach($tracks as $track)
                        <button class="btn btn-danger btn-sm text-light font-weight-bold"
                                onclick="window.location.href='{{route('track.show',$track->id)}}'">
                            @if($track->id_dnia==1)
                                Poniedziałek
                            @elseif($track->id_dnia==2)
                                Wtorek
                            @elseif($track->id_dnia==3)
                                Środa
                            @elseif($track->id_dnia==4)
                                Czwartek
                            @elseif($track->id_dnia==5)
                                Piątek
                            @elseif($track->id_dnia==6)
                                Sobota
                            @else
                                Niedziela
                            @endif
                            <hr class="py-0 px-0 mx-0 my-0">
                            Kierowca: {{$track->driver->numer_sluzbowy}}
                        </button>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@stop
