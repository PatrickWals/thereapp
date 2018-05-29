<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use App\Room;
use Auth;

class ReservationController extends Controller
{



    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::where('User_ID', Auth::user()->User_ID)->get();

        return view('reservations.index')->with('reservations', $reservations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rooms = Room::roomstatus('Available')->pluck('RoomName','Room_ID');
        //return $rooms;
        return view('reservations.create')->with('rooms', $rooms);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $this->validate($request,[
            'startdate' => 'required|date',
            'enddate' => 'required|date|after_or_equal:startdate',
            'room' => 'required',
            'remarks' => 'required'
        ]);
        
        $room = Room::find($request->input('room'));

        $reservation = new Reservation;
        $reservation->User_ID = Auth::user()->User_ID;
        $reservation->Room_ID = $request->input('room');
        $reservation->Start_date = $request->input('startdate');
        $reservation->End_date = $request->input('enddate');
        $reservation->Reservation_remarks = $request->input('remarks');
        $reservation->PriceReservation = $room->RoomPrice;
        $reservation->Reservation_status ='Res_submit';
        $reservation->save();

        return redirect('/dashboard');       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reservation = Reservation::find($id);
        $room = Room::find($reservation->Room_ID);
        return view('reservations.show', compact('reservation', 'room'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $reservation = Reservation::find($id);

        $reservation->delete();

        return redirect('/reservations')->with('success', 'Reservation Removed');
    }

    public function availroom(request $request, $id)
    {
        $this->validate($request,[
            'startdate' => 'required|date',
            'enddate' => 'required|date|after_or_equal:startdate'
        ]);
        
        

    }
}
