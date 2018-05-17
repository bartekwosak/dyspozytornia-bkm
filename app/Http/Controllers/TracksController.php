<?php

namespace App\Http\Controllers;

use App\Brigade;
use App\Http\Requests\AddTrackRequest;
use App\Track;
use Auth;
use Datatables;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TracksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(AddTrackRequest $addTrackRequest)
    {
        $track = new Track($addTrackRequest->all());
        Auth::user()->tracks()->save($track);
        Session::flash('track_created','Nowy kurs został dodany!');
        return back();
    }

    public function show($id)
    {
        $brigades = DB::select('SELECT * FROM brigades WHERE NOT EXISTS(SELECT * FROM tracks 
                                WHERE tracks.brigade_id = brigades.id AND tracks.id_dnia = :id)', ['id' => $id]);

        $brigadesAll = Brigade::all();
        if ($id == 1) {
            $dzienTygodnia = 'Poniedziałek';
            $tracks = Track::sortable(['numer_kierowcy' => 'asc'])->where('id_dnia', 1)->get();
        } else if ($id == 2) {
            $dzienTygodnia = "Wtorek";
            $tracks = Track::sortable(['numer_kierowcy' => 'asc'])->where('id_dnia', 2)->get();
        } else if ($id == 3) {
            $dzienTygodnia = 'Środa';
            $tracks = Track::sortable(['numer_kierowcy' => 'asc'])->where('id_dnia', 3)->get();
        } else if ($id == 4) {
            $dzienTygodnia = 'Czwartek';
            $tracks = Track::sortable(['numer_kierowcy' => 'asc'])->where('id_dnia', 4)->get();
        } else if ($id == 5) {
            $dzienTygodnia = 'Piątek';
            $tracks = Track::sortable(['numer_kierowcy' => 'asc'])->where('id_dnia', 5)->get();
        } else if ($id == 6) {
            $dzienTygodnia = 'Sobota';
            $tracks = Track::sortable(['numer_kierowcy' => 'asc'])->where('id_dnia', 6)->get();
        } else {
            $dzienTygodnia = 'Niedziela';
            $tracks = Track::sortable(['numer_kierowcy' => 'asc'])->where('id_dnia', 7)->get();
        }
        $countTracks = $tracks->count();
        return view('tracks.show')->with(compact('dzienTygodnia', 'tracks', 'brigades', 'brigadesAll', 'countTracks', 'id'));
    }

    public function update(Request $request)
    {
        $track = Track::findOrFail($request->track_id);
        $track->update($request->all());
        Session::flash('track_modify','Kurs został zmodyfikowany!');
        return back();
    }

    public function destroy($id)
    {
        Track::where('id', '=', $id)->delete();
        Session::flash('track_delete','Kurs został usunięty!');
        return back();
    }

    public function deleteAll()
    {
        Track::truncate();
        DB::statement('ALTER TABLE tracks AUTO_INCREMENT = 1');
        Session::flash('track_deleteAll','Kurs został usunięty!');
        return back();
    }

}
