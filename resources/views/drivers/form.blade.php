<div class="form-group">
    <label for="numer_sluzbowy">Numer służbowy</label>
    <input type="text" class="form-control" name="numer_sluzbowy" id="numer_sluzbowy">
</div>

<div class="form-group">
    <label for="imie_kierowcy">Imię pracownika</label>
    <input type="text" class="form-control" name="imie_kierowcy" id="imie_kierowcy">
</div>

<div class="form-group">
    <label for="nazwisko_kierowcy">Nazwisko pracownika</label>
    <input type="text" class="form-control" name="nazwisko_kierowcy" id="nazwisko_kierowcy">
</div>

<div class="form-group">
    <label for="grupa_stanowisko">Stanowisko</label>
    <select class="form-control" id="grupa_stanowisko" name="grupa_stanowisko">
        <option name="Prezes główny" value="Prezes główny">Prezes główny</option>
        <option name="Prezes spółki" value="Prezes spółki">Prezes spółki</option>
        <option name="Dyspozytor" value="Dyspozytor">Dyspozytor</option>
        <option name="Kadrowy" value="Kadrowy">Kadrowy</option>
        <option name="Nadzorca ruchu" value="Nadzorca ruchu">Nadzorca ruchu</option>
        <option name="Kierowca" value="Kierowca" selected>Kierowca</option>
        <option name="Mechanik" value="Mechanik">Mechanik</option>
    </select>
</div>

<div class="form-group">
    <label for="dni_pracy">Dni pracy</label>
    <select class="form-control" id="dni_pracy" name="dni_pracy[]" multiple>
        <option name="1" value="1" selected>Poniedziałek</option>
        <option name="2" value="2">Wtorek</option>
        <option name="3" value="3">Środa</option>
        <option name="4" value="4">Czwartek</option>
        <option name="5" value="5">Piątek</option>
        <option name="6" value="6">Sobota</option>
        <option name="7" value="7">Niedziela</option>
    </select>
</div>

<div class="form-group">
    <label for="stalka">Pojazd stały</label>
    <input type="text" class="form-control" name="stalka" id="stalka">
</div>
