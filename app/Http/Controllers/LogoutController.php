<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Support\Facades\Redirect;

class LogoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function doLogout()
    {
        Auth::logout();
        return Redirect::to('/logout');
    }
}
