@extends('_layouts.app')


@section('content')

<div class="row justify-content-center">
    <div class="col-md-8" >
        <a href="/dashboard" class="btn btn-primary">Go back</a> 
         
        @if(!Auth::guest())
            @if($reservation->user_ID == Auth::user()->id)   
            <div class="container">
               <br> Begin Datum: {{$reservation->Start_date}} <br>
                Eind Datum: {{$reservation->Start_date}} <br>
                Kamer: {{$room->RoomName}} <br>
                Prijs: € {{$reservation->RoomPrice}} <br>
                Status: {{$reservation->Reservation_status}} <br>
                Opmerkingen: {{$reservation->Reservation_remarks}} <br><br>

                {!!Form::open(['action' => ['ReservationController@destroy', $reservation->Reservation_ID], 'method' => 'POST', 'class' => ''])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                {!!Form::close()!!} 
            </div>
            @endif
        @endif
    </div>
</div>

@endsection