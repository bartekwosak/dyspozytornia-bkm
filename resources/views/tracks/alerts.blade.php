@if(Session::has('track_created'))
    <div id="track_alert" class="alert alert-success alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{Session::get('track_created')}}
    </div>
@endif

@if(Session::has('track_modify'))
    <div id="track_alert" class="alert alert-success alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{Session::get('track_modify')}}
    </div>
@endif

@if(Session::has('track_delete'))
    <div id="track_alert" class="alert alert-success alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{Session::get('track_delete')}}
    </div>
@endif

@if(Session::has('track_deleteAll'))
    <div id="track_alert" class="alert alert-success alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{Session::get('track_deleteAll')}}
    </div>
@endif

@if(Session::has('archive_graphic'))
    <div id="track_alert" class="alert alert-success alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{Session::get('archive_graphic')}}
    </div>
@endif
