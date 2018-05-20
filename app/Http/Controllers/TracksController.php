<?php

namespace App\Http\Controllers;

use App\Brigade;
use App\Driver;
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
        Session::flash('track_created', 'Nowy kurs został dodany!');
        return back();
    }

    public function show($id)
    {
        if ($id > 7) {
            return redirect('/');
        }
        $brigades = DB::select("SELECT * FROM brigades WHERE NOT EXISTS(SELECT * FROM tracks 
                                WHERE tracks.brigade_id = brigades.id AND tracks.id_dnia = :id)
                                AND CASE WHEN :id_dnia BETWEEN 1 AND 5 THEN brigades.rodzaj_dnia = 'Dzień roboczy'
                                WHEN :id_dnia_sob = 6 THEN brigades.rodzaj_dnia = 'Sobota'
                                ELSE brigades.rodzaj_dnia = 'Niedziela i święta' END", ['id' => $id, 'id_dnia' => $id, 'id_dnia_sob' => $id]);

        $drivers = DB::select("SELECT * FROM drivers WHERE NOT EXISTS(SELECT * FROM tracks
                                WHERE tracks.driver_id = drivers.id AND tracks.id_dnia = :id)
                                AND drivers.dni_pracy LIKE CONCAT('%',:id_pracy,'%')", ['id' => $id, 'id_pracy' => $id]);

        DB::statement("DELETE FROM tracks WHERE tracks.driver_id NOT IN (SELECT drivers.id FROM drivers 
            WHERE drivers.dni_pracy LIKE CONCAT('%',:id,'%'))",['id' => $id]);

        $tracks = Track::where('id_dnia', $id)->get();
        $brigadesAll = Brigade::all();
        $weekDays = array('Poniedziałek', 'Wtorek', 'Środa', 'Czwartek', 'Piątek', 'Sobota', 'Niedziela');
        $countTracks = Track::get()->count();
        $countBrigades = Brigade::get()->count();
        $countDrivers = Driver::get()->count();
        return view('tracks.show')->with(compact('weekDays', 'tracks', 'brigades', 'drivers', 'brigadesAll',
            'countTracks', 'countBrigades', 'countDrivers', 'id'));
    }

    public function update(Request $request)
    {
        $track = Track::findOrFail($request->track_id);
        $track->update($request->all());
        Session::flash('track_modify', 'Kurs został zmodyfikowany!');
        return back();
    }

    public function destroy($id)
    {
        Track::where('id', '=', $id)->delete();
        Session::flash('track_delete', 'Kurs został usunięty!');
        return back();
    }

    public function deleteAll()
    {
        Track::truncate();
        DB::statement('ALTER TABLE tracks AUTO_INCREMENT = 1');
        Session::flash('track_deleteAll', 'Grafik został usunięty!');
        return back();
    }

}
