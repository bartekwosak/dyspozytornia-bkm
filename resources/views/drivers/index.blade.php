@extends('layouts.master')

@section('title')
    Wykaz kierowców
@endsection

@section('jumbotron')

    <div class="jumbotron text-center mw-25">
        <header class="h1">Wykaz kierowców BKM</header>
        <br>
        <p>Poniżej znajduje się wykaz kierowców pracujących w sieci BKM</p>
    </div>

@stop

@section('content')

    @include('errors.errorsform')
    @include('drivers.modal')

    <div class="row">
        <div class="col-xl-9 mb-2">
            <div class="card border border-success">
                <div class="card-header bg-success border border-success text-light">
                    Wykaz kierowców BKM
                </div>
                <div class="card-body">
                    <table id="driversTable" class="table table-bordered table-hover dataTable">
                        <thead class="text-center">
                        <tr>
                            <th>Szczegóły</th>
                            <th style="width: 15%">Numer</th>
                            <th>Nazwisko</th>
                            <th>Imię</th>
                            <th>Etat</th>
                            <th>Dni pracy</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($drivers as $driver)
                            <tr>
                                <td class="text-center"><span class="badge
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
                                    @endif py-2 px-2">
                                        <a href="{{route('driver.show',$driver->id)}}">
                                            <img src="/images/user.png" width="37px" height="37px">
                                        </a>
                                    </span>
                                </td>
                                <td>{{$driver->numer_sluzbowy}}</td>
                                <td>{{$driver->nazwisko_kierowcy}}</td>
                                <td>{{$driver->imie_kierowcy}}</td>
                                <td>{{strlen($driver->dni_pracy)}}/7</td>
                                <td>
                                    @if(strstr($driver->dni_pracy,'1'))
                                        <span class="badge bg-darken-3 font-weight-bold text-light">Pon</span>
                                    @endif
                                    @if(strstr($driver->dni_pracy,'2'))
                                        <span class="badge bg-darken-3 font-weight-bold text-light">Wt</span>
                                    @endif
                                    @if(strstr($driver->dni_pracy,'3'))
                                        <span class="badge bg-darken-3 font-weight-bold text-light">Śr</span>
                                    @endif
                                    @if(strstr($driver->dni_pracy,'4'))
                                        <span class="badge bg-darken-3 font-weight-bold text-light">Czw</span>
                                    @endif
                                    @if(strstr($driver->dni_pracy,'5'))
                                        <span class="badge bg-darken-3 font-weight-bold text-light">Pt</span>
                                    @endif
                                    @if(strstr($driver->dni_pracy,'6'))
                                        <span class="badge badge-secondary font-weight-bold text-light">Sob</span>
                                    @endif
                                    @if(strstr($driver->dni_pracy,'7'))
                                            <span class="badge bg-navy font-weight-bold text-light">Nd</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <body data-spy="scroll" data-target="#myScrollspy" data-offset="20">
        <div class="col-xl-3">
            <div class="card border border-warning">
                <div class="card-header text-light bg-warning border border-warning">
                    Narzędzia
                </div>
                <div class="card-body text-center">
                    <div class="btn-group btn-group-justified mx-auto my-auto w-100">
                        <button type="button" class="btn btn-primary w-100 mb-1" data-toggle="modal"
                                data-target="#myModal">
                            Dodaj kierowcę
                        </button>
                    </div>
                    <div class="btn-group btn-group-justified mx-auto my-auto w-100">
                        <button type="button" class="btn btn-info w-100 mb-1" data-toggle="modal"
                                data-target="#archive">
                            Archiwizuj wykaz
                        </button>
                    </div>
                    <div class="btn-group btn-group-justified mx-auto my-auto w-100">
                        @if($countDrivers == 0)
                            <button type="button" class="btn btn-danger disabled w-100" style="pointer-events: none"
                                    data-toggle="modal"
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
        </body>
    </div>
@stop
