@extends('_layouts.app')


@section('content')

<h1>Kamers</h1>

@if(count($rooms)>0)
    @foreach($rooms as $room)
    <div class="row">
        <div class="col-md-2">
            <h3>
               
                {!!Form::open(['action' => ['RoomController@destroy', $room->Room_ID], 'method' => 'POST'])!!}
                 <a href="rooms/{{$room->Room_ID}}">{{$room->RoomName}}</a>
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger float-right'])}}
                {!!Form::close()!!}
            </h3>    
        </div>
    </div>
      
    @endforeach
@else
    <p>Op dit moment is er geen nieuws</p>
@endif

@endsection