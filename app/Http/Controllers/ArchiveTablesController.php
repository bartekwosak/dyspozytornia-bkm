<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ArchiveTablesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function archiveGraphic()
    {
        DB::statement("DROP TABLE IF EXISTS archive_graphic CASCADE ");
        DB::statement("CREATE TABLE archive_graphic LIKE tracks");
        DB::statement("INSERT INTO archive_graphic (SELECT * FROM tracks)");
        Session::flash('archive_graphic', 'Zarchiwizowano grafik do bazy danych!');
        return back();
    }

    public function archiveBrigades()
    {
        DB::statement("DROP TABLE IF EXISTS archive_brigades CASCADE ");
        DB::statement("CREATE TABLE archive_brigades LIKE brigades");
        DB::statement("INSERT INTO archive_brigades (SELECT * FROM brigades)");
        Session::flash('archive_brigades', 'Zarchiwizowano wykaz brygad do bazy danych!');
        return back();
    }

    public function archiveDrivers()
    {
        DB::statement("DROP TABLE IF EXISTS archive_drivers CASCADE ");
        DB::statement("CREATE TABLE archive_drivers LIKE drivers");
        DB::statement("INSERT INTO archive_drivers (SELECT * FROM drivers)");
        Session::flash('archive_drivers', 'Zarchiwizowano wykaz kierowców do bazy danych!');
        return back();
    }


}
