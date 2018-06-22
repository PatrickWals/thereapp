<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Userevent;
use App\User;
use App\Reservation;
use App\Room;
use Auth;


class EventController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        return view('events.index')->with('events', $events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rooms = Room::roomstatus('Available')->pluck('RoomName','Room_ID');
        return view('events/create',compact('rooms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'eventname' => 'required|min:5' ,
            'body' => 'required'
        ]);   
        if ($request->hasFile ('event_image')){
            $filenameWhithtxt = $request->file ('event_image')-> getClientOriginalName(); 
            // Get just filename
            $filename = pathinfo ($filenameWhithtxt, PATHINFO_FILENAME); 
            //get just ext
            $extention= $request->file('event_image')->getClientOriginalExtension();
            //Filename to store
            $filenametostore = $filename.time().'.'.$extention; 
            //upload image
            $path = $request->file('event_image')->storeAs('public/event_image',$filenametostore);
        } else {
            $filenametostore='noimage.jpg';
        }
        
        $reservation = new Reservation;
        $reservation->User_ID = Auth::user()->User_ID;
        $reservation->Room_ID = $request->input('room');
        $reservation->Start_date = $request->input('eventdate');
        $reservation->End_date = $request->input('eventdate');
        $reservation->PriceReservation = 0;
        $reservation->Reservation_status = 'Booked';
        $reservation->Reservation_remarks = $request->input('eventname');
        
        $reservation->save();


        $event = new Event;
        $event->Reservation_ID = $reservation->Reservation_ID;
        $event->Eventname = $request->input('eventname');
        $event->Description =$request->input('body');
        $event->Futurelab_Str= $request->input('futurelab');
        $event->Event_status = $request->input('eventstatus');
        $event->Event_link = $request->input('eventlink');
        $event->Owner_ID = Auth::user()->User_ID;
        $event->Event_Pic =$filenametostore;

        $event->save();
    
        return redirect('/events')->with('succes','Event added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userevent = Userevent::Where('Even_ID', $id);
        $event = Event::find($id);
        return view('events.show',compact('event', 'userevent'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rooms = Room::roomstatus('Available')->pluck('RoomName','Room_ID');
        $event = Event::find($id);
        return view('events.edit',compact('rooms','event'));
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
            'eventname' => 'required',
            'body' => 'required',
            'eventlink' => 'string|nullable',
            'event_image' => 'image|nullable|max:1999'
        ]);
        if ($request->hasFile ('event_image')){
            $filenameWhithtxt = $request->file ('event_image')-> getClientOriginalName(); 
            // Get just filename
            $filename = pathinfo ($filenameWhithtxt, PATHINFO_FILENAME); 
            //get just ext
            $extention= $request->file('event_image')->getClientOriginalExtension();
            //Filename to store
            $filenametostore = $filename.time().'.'.$extention; 
            //upload image
            $path = $request->file('event_image')->storeAs('public/event_image',$filenametostore);
        } else {
            $filenametostore='noimage.jpg';
        }


        
        $event = Event::find($id);
        $event->Eventname = $request->input('eventname');
        $event->Description = $request->input('body');
        $event->Futurelab_Str = $request->input('futurelab');
        $event->Event_link = $request->input('eventlink');
        if($filenametostore != 'noimage.jpg'){
            $event->Event_Pic = $filenametostore;
        }
        $event->Event_status = $request->input('eventstatus');
        $event->save();

        return redirect("/events/".$id)->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $event = Event::find($id);
        $reservation = Reservation::find($event->Reservation_ID);
        $reservation->Reservation_status = 'canceled'; 
        $reservation->save();

        $event->delete();
        return redirect('/events')->with('success', 'Post Removed');
    }

    public function joinEvent(Request $request)
    {
        
        $userevent = new Userevent;

        $userevent->User_ID = Auth::user()->User_ID;
        $userevent->Event_ID = $request->input('Event_ID');

        $userevent->save();

        return redirect("/events/")->with('succes', 'U bent aangemeld');
    }

    public function indexUserEvent(Request $request)
    {

        $userevent = Userevent::find($request->input('Event_ID'));
        $event = Event::find($request->input('Event_ID'));
        $user = user::all();

        return view('events.indexUserEvent', compact('userevent', 'event', 'user'));
    }
}
