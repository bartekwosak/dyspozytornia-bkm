<script src="{{asset('js/app.js')}}"></script>

<script>
    $('#edit').on('show.bs.modal', function (event) {

        var button = $(event.relatedTarget)
        var numer_kierowcy = button.data('numer_kierowcy');
        var sluzba = button.data('sluzba');
        var godz_pracy = button.data('godz_pracy');
        var nr_pojazdu = button.data('nr_pojazdu');
        var track_id = button.data('track_id');
        var modal = $(this);
        modal.find('.modal-body #numer_kierowcy').val(numer_kierowcy);
        modal.find('.modal-body #sluzba').val(sluzba);
        modal.find('.modal-body #godz_pracy').val(godz_pracy);
        modal.find('.modal-body #nr_pojazdu').val(nr_pojazdu);
        modal.find('.modal-body #track_id').val(track_id);
    })
</script>

<script src="//code.jquery.com/jquery-1.12.4.js"></script>
<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="//cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.js"></script>

<script>
    $(document).ready(function () {
        $('#trackTable').DataTable({
            responsive: true,
            language: {
                url: '//cdn.datatables.net/plug-ins/1.10.16/i18n/Polish.json'
            },
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
            responsive: true,
            language: {
                url: '//cdn.datatables.net/plug-ins/1.10.16/i18n/Polish.json'
            },
            order: [],
            columnDefs: [{
                targets: [0], searchable: false, orderable: false, visible: true
            }, {targets: [3], searchable: false, orderable: true, visible: true}],
        })
    });
</script>

<script>
    window.setTimeout(function() {
        $("#track_alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
        });
    }, 2000);
</script>