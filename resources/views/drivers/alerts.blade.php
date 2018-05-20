@if(Session::has('driver_created'))
    <div id="driver_alert" class="alert alert-success alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{Session::get('driver_created')}}
    </div>
@endif

@if(Session::has('driver_modify'))
    <div id="driver_alert" class="alert alert-success alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{Session::get('driver_modify')}}
    </div>
@endif

@if(Session::has('driver_destroy'))
    <div id="driver_alert" class="alert alert-success alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{Session::get('driver_destroy')}}
    </div>
@endif

@if(Session::has('driver_deleteAll'))
    <div id="driver_alert" class="alert alert-success alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{Session::get('driver_deleteAll')}}
    </div>
@endif

@if(Session::has('archive_drivers'))
    <div id="driver_alert" class="alert alert-success alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{Session::get('archive_drivers')}}
    </div>
@endif