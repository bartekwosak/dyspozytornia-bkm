<div class="form-group">
    <label for="numer_kierowcy">Dzień</label>
    <input id="pl-hl-track-day" type="number" class="form-control" placeholder="{{$dzienTygodnia}}">
</div>

<div class="form-group">
    <label for="numer_kierowcy">Numer służbowy</label>
    <input type="number" class="form-control" name="numer_kierowcy" id="numer_kierowcy">
</div>

<div class="form-group">
    <label for="brigade_id">Służba</label>
    <select class="form-control" id="brigade_id" name="brigade_id">
        @foreach($brigadesAll as $brigade)
            <option name="{{$brigade->id}}"
                    value="{{$brigade->id}}">{{$brigade->numer_brygady}}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="nr_pojazdu">Numer pojazdu</label>
    <input type="number" class="form-control" name="nr_pojazdu" id="nr_pojazdu">
</div>