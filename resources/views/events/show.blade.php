@extends('_layouts.app')


@section('content')

<div class="row justify-content-center">
    <div class="col-md-8" >
        <a href="/events" class="btn btn-primary">Go back</a>
        <div class="card">
            <div class="card-header">
                <h3><b>{{$event->Eventname}}</b></h3>
            </div>

            <div class="card-body">
                {{$event->Description}}
            </div>
            <small>Event Created at: {{$event->created_at}}</small>
        </div>          
        @if(!Auth::guest())
            @if($event->user_ID == Auth::user()->id)   
                <a href="/events/{{$event->Event_ID}}/edit" class="btn btn-primary float-left">Edit</a>

                {!!Form::open(['action' => ['EventController@destroy', $event->Event_ID], 'method' => 'POST', 'class' => 'float-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                {!!Form::close()!!}   
            @endif
        @endif
    </div>
</div>

@endsection