<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function accesdenied()
    {
        return view('pages.accesdenied');
    }

    public function search()
    {
        return view('pages.search');
    }
    
    public function adminpage()
    {
        return view('pages.adminpage');
    }
    
}
