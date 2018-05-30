<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use Auth;

class ChatsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return 'worked';
    }

    public function fetchMessages()
    {

    }

    public function sendMessage()
    {
        
    }
    
}
