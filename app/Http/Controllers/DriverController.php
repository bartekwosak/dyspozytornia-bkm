<?php

namespace App\Http\Controllers;

use App\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (route('driver.index', 'DriverController')) {
            $drivers = Driver::sortable('id', 'asc')->get();
        } else {
            $drivers = Driver::sortable('id', 'desc')->get();
        }
        $countDrivers = $drivers->count();
        return view('drivers.index')->with(compact('drivers', 'countDrivers'));
    }

    public function show($id)
    {
        $driver = Driver::findOrFail($id);
        return view('drivers.show')->with('driver', $driver);
    }

    public function store(Request $request)
    {
        $driver = new Driver($request->all());
        Auth::user()->drivers()->save($driver);
        return back();
    }

    public function destroy($id)
    {
        Driver::where('id', '=', $id)->delete();
        return redirect('/driver');
    }

    public function deleteAll()
    {
        Driver::truncate();
        DB::statement('ALTER TABLE drivers AUTO_INCREMENT = 1');
        return back();
    }

}
