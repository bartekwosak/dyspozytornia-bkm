<?php

namespace App\Http\Controllers;

use App\Driver;
use App\Track;
use Auth;
use Datatables;
use DB;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $drivers = Driver::sortable('numer_sluzbowy', 'asc')->get();
        $countDrivers = $drivers->count();
        return view('drivers.index')->with(compact('drivers', 'countDrivers'));
    }

    public function show($id)
    {
        $driver = Driver::findOrFail($id);
        $tracks = Track::where('driver_id','=',$id)->get();
        return view('drivers.show')->with(compact('driver','tracks'));
    }

    public function store(Request $request)
    {
        $driver = new Driver();
        $driver->numer_sluzbowy = $request->input('numer_sluzbowy');
        $driver->imie_kierowcy = $request->input('imie_kierowcy');
        $driver->nazwisko_kierowcy = $request->input('nazwisko_kierowcy');
        $driver->dni_pracy = implode($request->dni_pracy);
        $driver->stalka = $request->input("stalka");
        $driver->grupa_stanowisko = $request->input("grupa_stanowisko");
        Auth::user()->drivers()->save($driver);
        return back();
    }

    public function destroy($id)
    {
        Driver::where('id', '=', $id)->delete();
        Track::where('driver_id', '=', $id)->delete();
        return redirect('/driver');
    }

    public function deleteAll()
    {
        Driver::truncate();
        DB::statement('ALTER TABLE drivers AUTO_INCREMENT = 1');
        return back();
    }

}
