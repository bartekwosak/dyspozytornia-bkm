<?php

namespace App\Http\Controllers;

use App\Driver;
use App\Http\Requests\DriverRequest;
use App\Track;
use Auth;
use Datatables;
use DB;
use Illuminate\Support\Facades\Session;

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

    public function store(DriverRequest $driverRequest)
    {
        $driver = new Driver();
        $driver->numer_sluzbowy = $driverRequest->input('numer_sluzbowy');
        $driver->imie_kierowcy = $driverRequest->input('imie_kierowcy');
        $driver->nazwisko_kierowcy = $driverRequest->input('nazwisko_kierowcy');
        $driver->dni_pracy = implode($driverRequest->dni_pracy);
        $driver->stalka = $driverRequest->input("stalka");
        $driver->grupa_stanowisko = $driverRequest->input("grupa_stanowisko");
        Auth::user()->drivers()->save($driver);
        Session::flash('driver_created', 'Nowa kierowca został dodany!');
        return back();
    }

    public function update(DriverRequest $driverRequest)
    {
        $driver = Driver::findOrFail($driverRequest->driver_id);
        $driver->numer_sluzbowy = $driverRequest->input('numer_sluzbowy');
        $driver->imie_kierowcy = $driverRequest->input('imie_kierowcy');
        $driver->nazwisko_kierowcy = $driverRequest->input('nazwisko_kierowcy');
        $driver->dni_pracy = implode($driverRequest->dni_pracy);
        $driver->stalka = $driverRequest->input("stalka");
        $driver->grupa_stanowisko = $driverRequest->input("grupa_stanowisko");
        Auth::user()->drivers()->save($driver);
        Session::flash('driver_modify', 'Dane kierowcy zostały zaktualizowane!');
        return back();
    }

    public function destroy($id)
    {
        Driver::where('id', '=', $id)->delete();
        Track::where('driver_id', '=', $id)->delete();
        Session::flash('driver_destroy', 'Kierowca został usunięty!');
        return redirect('/driver');
    }

    public function deleteAll()
    {
        Driver::truncate();
        DB::statement('ALTER TABLE drivers AUTO_INCREMENT = 1');
        Session::flash('driver_deleteAll', 'Wykaz kierowców został usunięty!');
        return back();
    }

}
