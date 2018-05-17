@extends('_layouts.app')


@section('content')

<h1>Kamers</h1>

<div class="row justify-content-center">
    <div class="col-md-8">
        {!! Form::open(['action' => 'RoomController@store', 'method' => 'POST' , 'enctype' => 'multipart/form-data']) !!}

        <div class="form-group justify-content-center">
            {{Form::label('roomname', 'Kamer naam:')}}
            {{Form::text('roomname', '', ['class' => 'form-control', 'placeholder' => ''])}}
        </div>
    
        <div class="form-group">
            {{Form::label('description','Beschrijving')}}
            {{Form::textarea('description', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => ''])}}  
        </div>
    
        <div class="form-group">
            {{Form::label('roomprice','Prijs van de kamer')}}
            {{Form::number('roomprice','',['class' => 'form-control'])}}
        </div>

        <div class="form-group">
            {{Form::label('futurelab','FutureLab')}}
            {{Form::select('futurelab',['1' => 'Food'
            ],null)}}

        </div>
            {{-- <div class="form-group">
                {{Form::file('room_image')}}
            </div> --}}
    
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}
    </div>
</div>

@endsection