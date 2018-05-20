<?php

namespace App\Http\Controllers;

use App\Brigade;
use App\Track;
use Auth;
use Datatables;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BrigadesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $brigades = Brigade::sortable('numer_brygady', 'asc')->get();
        $countBrigades = $brigades->count();
        return view('brigades.index')->with(compact('brigades', 'countBrigades'));
    }

    public function show($id)
    {
        $brigade = Brigade::findOrFail($id);
        $tracks = Track::where('brigade_id','=',$id)->get();
        return view('brigades.show')->with(compact('brigade','tracks'));
    }

    public function store(Request $request)
    {
        $brigade = new Brigade($request->all());
        Auth::user()->brigades()->save($brigade);
        Session::flash('brigade_created', 'Nowa brygada została dodana!');
        return back();
    }

    public function update(Request $request)
    {
        $brigade = Brigade::findOrFail($request->brigade_id);
        $brigade->update($request->all());
        Session::flash('brigade_modify', 'Brygada został zmodyfikowana!');
        return back();
    }

    public function destroy($id)
    {
        Brigade::where('id', '=', $id)->delete();
        Track::where('brigade_id', '=', $id)->delete();
        Session::flash('brigade_delete', 'Brygada została usunięta i kursy w grafiku z nią powiązane!');
        return redirect('/brigade');
    }

    public function deleteAll()
    {
        Brigade::truncate();
        Track::truncate();
        DB::statement('ALTER TABLE brigades AUTO_INCREMENT = 1');
        DB::statement('ALTER TABLE tracks AUTO_INCREMENT = 1');
        Session::flash('brigade_deleteAll', 'Wykaz brygad został usunięty!');
        return back();
    }


}
