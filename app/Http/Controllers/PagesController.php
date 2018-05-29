<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD
use App\User;

class PagesController extends Controller
{
    
    public function home(){
        $users= User::all();
        return view('pages.home',compact('users'));
=======

class PagesController extends Controller
{
    public function home(){
        return view('pages.home');
    }

    public function accesdenied(){
        return view('pages.accesdenied');
    }

    public function search(){
        return view('pages.search');
>>>>>>> reservationS2.1
    }
}
