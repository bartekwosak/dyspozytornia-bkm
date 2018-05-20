<script src="{{asset('js/app.js')}}"></script>

<script>
    $('#edit').on('show.bs.modal', function (event) {

        var button = $(event.relatedTarget)
        var numer_kierowcy = button.data('numer_kierowcy');
        var sluzba = button.data('sluzba');
        var nr_pojazdu = button.data('nr_pojazdu');
        var track_id = button.data('track_id');
        var modal = $(this);
        modal.find('.modal-body #numer_kierowcy').val(numer_kierowcy);
        modal.find('.modal-body #sluzba').val(sluzba);
        modal.find('.modal-body #nr_pojazdu').val(nr_pojazdu);
        modal.find('.modal-body #track_id').val(track_id);
    })

    $('#editBrigade').on('show.bs.modal', function (event) {

        var button = $(event.relatedTarget)
        var numer_brygady = button.data('numer_brygady');
        var rodzaj_dnia = button.data('rodzaj_dnia');
        var godziny = button.data('godziny');
        var miejsce_zmiany = button.data('miejsce_zmiany');
        var przydzial = button.data('przydzial');
        var spolka = button.data('spolka');
        var brigade_id = button.data('brigade_id');
        var modal = $(this);
        modal.find('.modal-body #numer_brygady').val(numer_brygady);
        modal.find('.modal-body #rodzaj_dnia').val(rodzaj_dnia);
        modal.find('.modal-body #godziny').val(godziny);
        modal.find('.modal-body #miejsce_zmiany').val(miejsce_zmiany);
        modal.find('.modal-body #przydzial').val(przydzial);
        modal.find('.modal-body #spolka').val(spolka);
        modal.find('.modal-body #brigade_id').val(brigade_id);
    })
</script>

<script src="//code.jquery.com/jquery-1.12.4.js"></script>
<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="//cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.js"></script>\
<script src="//cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="//cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.5.1/js/buttons.bootstrap4.min.js"></script>

<script>
    $(document).ready(function () {
        $('#trackTable').DataTable({
            dom: 'Bfrtip',
            responsive: true,
            language: {
                url: '//cdn.datatables.net/plug-ins/1.10.16/i18n/Polish.json'
            },
            buttons: [
                {
                    extend: 'pdf',
                    orientation: 'landscape',
                    pageSize: 'LEGAL',
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5]
                    },
                    text: 'Eksport: PDF',
                    className: 'btn btn-primary text-light'
                }
            ],
            order: [],
            columnDefs: [{
                targets: [0], searchable: false, orderable: false, visible: true
            }, {targets: [3], searchable: false, orderable: true, visible: true}],
        });
    });
</script>

<script>
    $(document).ready(function () {
        $('#brigadeTable').DataTable({
            dom: 'Bfrtip',
            responsive: true,
            language: {
                url: '//cdn.datatables.net/plug-ins/1.10.16/i18n/Polish.json'
            },
            buttons: [
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5,6]
                    },
                    text: 'Eksport: PDF',
                    className: 'btn btn-primary text-light',
                    pageSize: 'LEGAL',
                    orientation: 'landscape',
                    title: 'Wykaz brygad BKM'
                }
            ],
            order: [],
            columnDefs: [{
                targets: [0], searchable: false, orderable: false, visible: true
            }, {targets: [3], searchable: false, orderable: true, visible: true}],
        })
    });
</script>

<script>
    $(document).ready(function () {
        $('#driversTable').DataTable({
            dom: 'Bfrtip',
            responsive: true,
            language: {
                url: '//cdn.datatables.net/plug-ins/1.10.16/i18n/Polish.json'
            },
            buttons: [
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5]
                    },
                    text: 'Eksport: PDF',
                    className: 'btn btn-primary text-light',
                    pageSize: 'LEGAL',
                    orientation: 'landscape',
                    title: 'Wykaz pracowników BKM'
                }
            ],
            order: [],
            columnDefs: [{
                targets: [0], searchable: false, orderable: false, visible: true
            }],
        })
    });
</script>

<script>
    window.setTimeout(function () {
        $("#track_alert").fadeTo(500, 0).slideUp(500, function () {
            $(this).remove();
        });
    }, 2000);
    window.setTimeout(function () {
        $("#brigade_alert").fadeTo(500, 0).slideUp(500, function () {
            $(this).remove();
        });
    }, 2000);
</script>