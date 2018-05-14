<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddTrackRequest;
use App\Track;
use Auth;
use Datatables;
use DB;
use Illuminate\Http\Request;

class TracksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tracks = Track::sortable('numer_kierowcy', 'asc')->get();
        $countTracks = $tracks->count();
        return view('tracks.index')->with(compact('tracks', 'countTracks'));
    }

    public function store(AddTrackRequest $addTrackRequest)
    {
        $track = new Track($addTrackRequest->all());
        Auth::user()->tracks()->save($track);
        return back();
    }

    public function show($id)
    {
        if ($id == 1) {
            $dzienTygodnia = 'Poniedziałek';
            $tracks = Track::sortable(['numer_kierowcy' => 'desc'])->get();
        } else if ($id == 2) {
            $dzienTygodnia = "Wtorek";
            $tracks = Track::sortable(['numer_kierowcy' => 'asc'])->get();
        } else if ($id == 3) {
            $dzienTygodnia = 'Środa';
            $tracks = Track::sortable(['numer_kierowcy' => 'asc'])->get();
        } else if ($id == 4) {
            $dzienTygodnia = 'Czwartek';
            $tracks = Track::sortable(['numer_kierowcy' => 'asc'])->get();
        } else if ($id == 5) {
            $dzienTygodnia = 'Piątek';
            $tracks = Track::sortable(['numer_kierowcy' => 'asc'])->get();
        } else if ($id == 6) {
            $dzienTygodnia = 'Sobota';
            $tracks = Track::sortable(['numer_kierowcy' => 'asc'])->get();
        } else {
            $dzienTygodnia = 'Niedziela';
            $tracks = Track::sortable(['numer_kierowcy' => 'asc'])->get();
        }
        $countTracks = $tracks->count();
        return view('tracks.show')->with(compact('dzienTygodnia', 'tracks', 'countTracks'));
    }

    public function update(Request $request)
    {
        $track = Track::findOrFail($request->track_id);
        $track->update($request->all());
        return back();
    }

    public function destroy($id)
    {
        Track::where('id', '=', $id)->delete();
        return back();
    }

    public function deleteAll()
    {
        Track::truncate();
        DB::statement('ALTER TABLE tracks AUTO_INCREMENT = 1');
        return back();
    }

}
