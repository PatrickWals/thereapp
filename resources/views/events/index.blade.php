@extends('_layouts.app')


@section('content')

<div class="container">
        <h1>Evenementen</h1>
        {{-- <div class="form-group float-right">
            {{Form::select('futurelab',['Flab1' => 'Flab1','Flab2' => 'Flab2',
            'Flab3' => 'Flab3','Flab4' => 'Flab4','Flab5' => 'Flab5','Flab6' => 'Flab6'
            ],null)}}
        </div>   --}}
    </div>

@if(count($events)>0)

    @foreach($events as $event)
        <div class="container ">
        <h3><a href="events/{{$event->Event_ID}}">{{$event->Eventname}}</a></h3>
            <p>{{$event->Body}}</p>
        </div>
    @endforeach
@else
    <div class="container">
        <p>Op dit moment zijn er geen events</p>
    </div>
    
@endif

@endsection