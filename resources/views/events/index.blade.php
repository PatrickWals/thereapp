@extends('_layouts.app')


@section('content')

<h1>Events</h1>

@if(count($events)>0)
    @foreach($events as $event)
        <div class="container ">
        <h3><a href="events/{{$event->id}}">{{$event->title}}</a></h3>
            <p>{{$event->body}}</p>
        </div>
    @endforeach
@else
    <p>Op dit moment zijn er geen events</p>
@endif

@endsection