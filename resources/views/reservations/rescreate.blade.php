@extends('_layouts.app')


@section('content')
    
<h1>Reservering maken</h1>
    <div class="row justify-content-center">
        
        <div class="col-md-8 ">
            <a href="/dashboard" class="btn btn-primary">Go back</a>

            {!! Form::open(['action' => 'ReservationController@availroom', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <div class="form-group">
                    {{Form::label('startdate', 'Begin datum')}}
                    {{Form::date('startdate', '', ['class' => 'form-control', 'placeholder' => ''])}}
                </div>
                
                <div class="form-group">
                    {{Form::label('enddate', 'Eind datum')}}
                    {{Form::date('enddate', '', ['class' => 'form-control', 'placeholder' => ''])}}
                </div>
                

                {{-- <div class="form-group">
                    {{Form::select('room', $rooms, null, ['placeholder' => 'Pick a Room...'])}}
                </div> --}}

                {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
            {!! Form::close() !!}
        </div>
    </div>
@endsection