<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::all();
        //return $rooms;


        return view('rooms.index')->with('rooms', $rooms);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rooms.create');
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
            'roomname' => 'required',
            'description' => 'required',
            'roomprice' => 'integer|required'
        ]);

        $room = new Room;
        $room->RoomName = $request->input('roomname');
        $room->Availability = 0;
        $room->Description = $request->input('description');
        $room->RoomPrice = $request->input('roomprice');
        $room->FutureLab_Str = $request->input('futurelab');
        $room->Room_status = 'Available';
        $room ->save();

        return redirect('/rooms/create')->with('success', 'Room added');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $room = Room::find($id);

        return view('rooms.edit')->with('room', $room); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $room = Room::find($id);
        return view('rooms.edit')->with('room',$room);
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
        $this->validate($request,[
            'roomname' => 'required',
            'description' => 'required',
            'roomprice' => 'integer|required'
        ]);

        $room = Room::find($id);
        $room->RoomName = $request->input('roomname');
        $room->Availability = 0;
        $room->Description = $request->input('description');
        $room->RoomPrice = $request->input('roomprice');
        $room->FutureLab_Str = $request->input('futurelab');
        $room ->save();

        return redirect('/rooms');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $room = Room::find($id);

        $room->delete(); 

        return redirect('/rooms')->with('success', 'Room Removed');  
    }
}
