<?php

namespace App\Http\Controllers;

use App\DateGraphic;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DateGraphicController extends Controller
{
    public function store(Request $request)
    {
        DB::statement('DELETE FROM date_graphics WHERE id_dnia_grafik = :id', ['id' => $request->get('id_dnia_grafik')]);
        $date = new DateGraphic($request->all());
        $date->save();
        return back();
    }
}
