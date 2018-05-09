@extends('_layouts.app')


@section('content')

<h1>Kamers</h1>

<div class="row justify-content-center">
    <div class="col-md-8">
        {!! Form::open(['action' => ['RoomController@update', $room->Room_ID], 'method' => 'POST' , 'enctype' => 'multipart/form-data']) !!}

        <div class="form-group justify-content-center">
            {{Form::label('roomname', 'Kamer naam:')}}
            {{Form::text('roomname', $room->RoomName, ['class' => 'form-control', 'placeholder' => ''])}}
        </div>
    
        <div class="form-group">
            {{Form::label('description','Beschrijving')}}
            {{Form::textarea('description', $room->Description, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => ''])}}  
        </div>
    
        <div class="form-group">
            {{Form::label('roomprice','Prijs van de kamer')}}
            {{Form::number('roomprice',$room->RoomPrice,['class' => 'form-control'])}}
        </div>

        <div class="form-group">
            {{Form::label('futurelab','FutureLab')}}
            {{Form::select('futurelab',['1' => 'Food'
            ],null)}}

        </div>
            {{-- <div class="form-group">
                {{Form::file('room_image')}}
            </div> --}}
    
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}
        
        {{-- Delete Button --}}
        {!!Form::open(['action' => ['RoomController@destroy', $room->Room_ID], 'method' => 'POST', 'class' => 'float-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-danger float-right'])}}
        {!!Form::close()!!}

    
    </div>
</div>

@endsection