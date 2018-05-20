
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Dodaj kierowcę</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{route('driver.store')}}" method="post">
                {{csrf_field()}}
                <div class="modal-body">
                    @include('drivers.form')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Anuluj</button>
                    <button type="submit" class="btn btn-primary">Dodaj</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editDriver" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Edytuj</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{route('driver.update','driver_id')}}" method="post">
                {{method_field('patch')}}
                {{csrf_field()}}
                <div class="modal-body">
                    <input type="hidden" name="driver_id" id="driver_id" value="">
                    @include('drivers.form')
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
                <h5 class="modal-title">Usuń wykaz</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Czy na pewno chcesz usunąć cały wykaz kierowców?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuluj</button>
                <button type="button" class="btn btn-danger" onclick="window.location.href='/deleteAllDrivers'">Usuń wykaz
                </button>
            </div>
        </div>
    </div>
</div>

<div id="archive" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Zarchiwizuj wykaz</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Czy na pewno chcesz wykonać archiwizację obecnego wykazu?
                <p class="text-danger font-weight-bold">Spowoduje to usunięcie poprzedniej kopii wykazu.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuluj</button>
                <button type="button" class="btn btn-danger" onclick="window.location.href='/archiveDrivers'">Archiwizuj
                </button>
            </div>
        </div>
    </div>
</div>

