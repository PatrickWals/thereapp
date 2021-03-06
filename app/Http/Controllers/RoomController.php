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
        if ($request->hasFile ('room_image')){
            $filenameWhithtxt = $request->file ('room_image')-> getClientOriginalName(); 
            // Get just filename
            $filename = pathinfo ($filenameWhithtxt, PATHINFO_FILENAME); 
            //get just ext
            $extention= $request->file('room_image')->getClientOriginalExtension();
            //Filename to store
            $filenametostore = $filename.time().'.'.$extention; 
            //upload image
            $path = $request->file('room_image')->storeAs('public/room_image',$filenametostore);
        } else {
            $filenametostore='noimage.jpg';
        }

        $room = new Room;
        $room->RoomName = $request->input('roomname');
        $room->Description = $request->input('description');
        $room->RoomPrice = $request->input('roomprice');
        $room->FutureLab_Str = $request->input('futurelab');
        $room->Room_status = $request->input('roomstatus');
        
        $room->Room_Pic = $filenametostore;
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
            'roomprice' => 'integer|required|min:0'
        ]);
        if ($request->hasFile ('room_image')){
            $filenameWhithtxt = $request->file ('room_image')-> getClientOriginalName(); 
            // Get just filename
            $filename = pathinfo ($filenameWhithtxt, PATHINFO_FILENAME); 
            //get just ext
            $extention= $request->file('room_image')->getClientOriginalExtension();
            //Filename to store
            $filenametostore = $filename.time().'.'.$extention; 
            //upload image
            $path = $request->file('room_image')->storeAs('public/room_image',$filenametostore);
        } else {
            $filenametostore='noimage.jpg';
        }

        $room = Room::find($id);
        $room->RoomName = $request->input('roomname');
        $room->Description = $request->input('description');
        $room->RoomPrice = $request->input('roomprice');
        $room->FutureLab_Str = $request->input('futurelab');
        $room->Room_status = $request->input('roomstatus');
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
