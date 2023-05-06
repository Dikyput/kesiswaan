<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PagesController extends Controller
{
    public function dashboard()

    {
        if(Auth::check()){
            $title = 'Dashboard';
            return view('pages.dashboard')->with('title', $title);;
        }

    }
    public function table()

    {
        $title = 'Table';
        return view('pages.table')->with('title', $title);;

    }
}
