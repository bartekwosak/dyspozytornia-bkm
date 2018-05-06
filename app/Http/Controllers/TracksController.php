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
        return view('tracks.index')->with(compact('tracks','countTracks'));
    }

    public function store(AddTrackRequest $addTrackRequest)
    {
        $track = new Track($addTrackRequest->all());
        Auth::user()->tracks()->save($track);
        return back();
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
