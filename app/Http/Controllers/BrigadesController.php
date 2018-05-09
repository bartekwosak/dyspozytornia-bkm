<?php

namespace App\Http\Controllers;

use App\Brigade;
use Auth;
use Datatables;
use DB;
use Illuminate\Http\Request;

class BrigadesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (route('brigade.index','BrigadesController')) {
            $brigades = Brigade::sortable('id', 'asc')->get();
        } else {
            $brigades = Brigade::sortable('id', 'desc')->get();
        }
        $countBrigades = $brigades->count();
        return view('brigades.index')->with(compact('brigades', 'countBrigades'));
    }

    public function show($id)
    {
        $brigade = Brigade::findOrFail($id);
        return view('brigades.show')->with('brigade', $brigade);
    }

    public function store(Request $request)
    {
        $brigade = new Brigade($request->all());
        Auth::user()->brigades()->save($brigade);
        return back();
    }

    public function deleteAll()
    {
        Brigade::truncate();
        DB::statement('ALTER TABLE brigades AUTO_INCREMENT = 1');
        return back();
    }


}
