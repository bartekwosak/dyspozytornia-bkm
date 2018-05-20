@extends('layouts.master')

@section('title')
    Kierowca: {{$driver->numer_sluzbowy}}
@endsection

@section('jumbotron')
    <div class="jumbotron text-center">
        <header class="h2 font-weight-bold">
            Kierowca:
            <div class="card bg-light text-success w-25 mx-auto mt-2">
                {{$driver->numer_sluzbowy}}<br>
            </div>
            <div class="card bg-light text-danger w-25 mx-auto mt-2">
                Etat: {{strlen($driver->dni_pracy)}}/7<br>
            </div>
        </header>
    </div>
@endsection
@section('content')

    @include('errors.errorsform')
    @include('drivers.modal')
    @include('drivers.alerts')

    <div id="deleteShowItem" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Usuń kierowcę</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Czy na pewno chcesz usunąć kierowcę?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuluj</button>
                    <button type="button" class="btn btn-danger"
                            onclick="window.location.href='/driver/deleteDriver/{{$driver->id}}'">Usuń
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-5">
            <div class="card border border-primary mb-3">
                <div class="card-header border border-primary bg-primary text-light">
                    Wizytówka
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-6">
                            <img class="card-img-top
                                @if($driver->grupa_stanowisko == 'Kadrowy')
                                    badge-info
                                @elseif($driver->grupa_stanowisko == 'Kierowca')
                                    bg-aqua
                                @elseif($driver->grupa_stanowisko == 'Dyspozytor')
                                    badge-warning
                                @elseif($driver->grupa_stanowisko == 'Nadzorca ruchu')
                                    bg-orange
                                @elseif($driver->grupa_stanowisko == 'Prezes spółki')
                                    badge-success
                                @elseif($driver->grupa_stanowisko == 'Prezes główny')
                                    bg-danger
                                @elseif($driver->grupa_stanowisko == 'Mechanik')
                                    bg-maroon
                                @endif
                                    bg-aqua text-center border border-primary" src="/images/user.png"
                                 alt="Card image cap">
                        </div>
                        <div class="col-xl-6">
                            <p class="text-primary font-weight-bold mb-1">
                                Imię:
                            </p>
                            <span class="badge bg-silver border border-secondary font-weight-bold w-100 mb-2"
                                  style="font-size: 19px">{{$driver->imie_kierowcy}}</span>
                            <p class="text-primary font-weight-bold mb-1">
                                Nazwisko:
                            </p>
                            <span class="badge bg-silver border border-secondary font-weight-bold w-100 mb-2"
                                  style="font-size: 19px">{{$driver->nazwisko_kierowcy}}</span>
                            <p class="text-primary font-weight-bold mb-1">
                                Stanowisko:
                            </p>
                            <span class="badge bg-silver border border-secondary font-weight-bold w-100 mb-2"
                                  style="font-size: 19px">{{$driver->grupa_stanowisko}}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <p class="text-primary font-weight-bold mb-1">
                                Etat:
                            </p>
                            <span class="badge bg-silver border border-secondary font-weight-bold w-100 mb-2"
                                  style="font-size: 19px">{{strlen($driver->dni_pracy)}}/7</span>
                            <p class="text-primary font-weight-bold mb-1">
                                Dni pracy:
                            </p>
                            <span class="badge bg-silver border border-secondary font-weight-bold w-100 mb-2">
                            @if(strstr($driver->dni_pracy,'1'))
                                    <span class="badge bg-darken-3 font-weight-bold text-light" style="font-size: 15px">Pon</span>
                                @endif
                                @if(strstr($driver->dni_pracy,'2'))
                                    <span class="badge bg-darken-3 font-weight-bold text-light" style="font-size: 15px">Wt</span>
                                @endif
                                @if(strstr($driver->dni_pracy,'3'))
                                    <span class="badge bg-darken-3 font-weight-bold text-light" style="font-size: 15px">Śr</span>
                                @endif
                                @if(strstr($driver->dni_pracy,'4'))
                                    <span class="badge bg-darken-3 font-weight-bold text-light" style="font-size: 15px">Czw</span>
                                @endif
                                @if(strstr($driver->dni_pracy,'5'))
                                    <span class="badge bg-darken-3 font-weight-bold text-light" style="font-size: 15px">Pt</span>
                                @endif
                                @if(strstr($driver->dni_pracy,'6'))
                                    <span class="badge badge-secondary font-weight-bold text-light"
                                          style="font-size: 15px">Sob</span>
                                @endif
                                @if(strstr($driver->dni_pracy,'7'))
                                    <span class="badge bg-navy font-weight-bold text-light"
                                          style="font-size: 15px">Nd</span>
                                @endif
                                </span>
                            <p class="text-primary font-weight-bold mb-1">
                                Przydział autobusu:
                            </p>
                            <span class="badge bg-silver border border-secondary font-weight-bold w-100 mb-2"
                                  style="font-size: 19px">#{{$driver->stalka}}</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-xl-7">
            <div class="card border border-info mb-3">
                <div class="card-header border border-info bg-info text-light">
                    Kursy w grafiku
                </div>
                <div class="card-body text-center flex-column">
                    @foreach($tracks as $track)
                        <button class="btn bg-darken-3 btn-sm font-weight-bold" onclick="window.location.href='{{route('track.show',$track->id_dnia)}}'">
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
                            {{$track->brigade->numer_brygady}}
                        </button>
                    @endforeach
                </div>
            </div>
            <div class="card border border-danger mb-3">
                <div class="card-header border border-danger bg-danger text-light">
                    Urlopy
                </div>
                <div class="card-body text-center flex-column">
                    <button class="btn bg-primary btn-sm font-weight-bold text-light">12.05.2018<hr class="py-0 px-0 mx-0 my-0">13.05.2018</button>
                    <button class="btn bg-primary btn-sm font-weight-bold text-light">16.05.2018<hr class="py-0 px-0 mx-0 my-0">18.05.2018</button>
                </div>
            </div>
            <div class="card border border-warning">
                <div class="card-header border border-warning bg-warning text-light">
                    Panel narzędzi
                </div>
                <div class="card-body text-center flex-column">
                    <button type="button" class="btn btn-primary w-50 mb-2"
                            data-toggle="modal"
                            data-target="#editDriver"
                            data-numer_sluzbowy="{{$driver->numer_sluzbowy}}"
                            data-imie_kierowcy="{{$driver->imie_kierowcy}}"
                            data-nazwisko_kierowcy="{{$driver->nazwisko_kierowcy}}"
                            data-stalka = "{{$driver->stalka}}"
                            data-driver_id="{{$driver->id}}">
                        Modyfikuj
                    </button>
                    <br>
                    <button type="button" class="btn btn-danger w-50" data-toggle="modal"
                            data-target="#deleteShowItem">
                        Usuń
                    </button>
                </div>
            </div>
        </div>
    </div>
@stop
