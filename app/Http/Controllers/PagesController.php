<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Interest;
use App\Speciality;


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

    public function adminPage()
    {
        return view('pages.adminpage');
    }

    public function addData(request $request)
    {
        
        $picker = $request->input('Picker');

        if($picker === 'Interest')
        {
            $interest = new Interest;

            $interest->Interest_Name = $request->input('data');
            $interest->save();
        }
        elseif($picker === 'Speciality')
        {
            $Speciality = new Speciality;

            $Speciality->Speciality_Name = $request->input('data');
            $Speciality->save();
        }

        return redirect('/admin')->with('succes', 'added');

    }
    
}
