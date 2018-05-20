@if(Session::has('brigade_created'))
    <div id="brigade_alert" class="alert alert-success alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{Session::get('brigade_created')}}
    </div>
@endif

@if(Session::has('brigade_modify'))
    <div id="brigade_alert" class="alert alert-success alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{Session::get('brigade_modify')}}
    </div>
@endif

@if(Session::has('brigade_delete'))
    <div id="brigade_alert" class="alert alert-success alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{Session::get('brigade_delete')}}
    </div>
@endif

@if(Session::has('brigade_deleteAll'))
    <div id="brigade_alert" class="alert alert-success alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{Session::get('brigade_deleteAll')}}
    </div>
@endif

@if(Session::has('archive_brigades'))
    <div id="brigade_alert" class="alert alert-success alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{Session::get('archive_brigades')}}
    </div>
@endif