<div class="form-group">
    <label for="numer_kierowcy">Dzień</label>
    <input id="pl-hl-track-day" type="number" class="form-control" placeholder="{{$weekDays[(Request::segment(2))-1]}}">
</div>

<div class="form-group">
    <label for="driver_id">Numer kierowcy</label>
    <select class="form-control" id="driver_id" name="driver_id">
        @foreach($drivers as $driver)
            <option name="{{$driver->id}}"
                    value="{{$driver->id}}">{{$driver->numer_sluzbowy}}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="brigade_id">Służba</label>
    <select class="form-control" id="brigade_id" name="brigade_id">
        @foreach($brigades as $brigade)
            <option name="{{$brigade->id}}"
                    value="{{$brigade->id}}">{{$brigade->numer_brygady}}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="nr_pojazdu">Numer pojazdu</label>
    <input type="number" class="form-control" name="nr_pojazdu" id="nr_pojazdu">
</div>