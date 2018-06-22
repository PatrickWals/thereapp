

@extends('_layouts.app')


@section('content')
    
<h1>Evenement Maker</h1>
    <div class="row justify-content-center">
        
        <div class="col-md-8 ">
            <a href="/dashboard" class="btn btn-primary">Ga terug</a>

            {!! Form::open(['action' => 'EventController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

            <h3>Event Details</h3>

            <div class="form-group">
                {{Form::label('eventname', 'Evenement naam: ')}}
                {{Form::text('eventname', '', ['class' => 'form-control', 'placeholder' => 'Event naam'])}}
            </div>

            <div class="form-group">
                {{Form::label('body', 'Evenement beschrijving: ')}}
                {{Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Beschrijving van het Event'])}}
            </div>

            <div class="form-group">
                {{Form::label('eventlink', 'Evenement link: ')}}
                {{Form::text('eventlink', '', ['class' => 'form-control', 'placeholder' => 'Event link'])}}
            </div>

            <div class="form-group">
                {{Form::label('futurelab','FutureLab')}}
                {{Form::select('futurelab',['Flab1' => 'Flab1','Flab2' => 'Flab2',
                'Flab3' => 'Flab3','Flab4' => 'Flab4','Flab5' => 'Flab5','Flab6' => 'Flab6'
                ],null)}}
            </div>  

            <h3>Datum en plaats</h3>
            
            <div class="form-group">
                {{Form::label('eventdate', 'Datum: ')}}
                {{Form::date('eventdate', '', ['class' => 'form-control', 'placeholder' => '','min' =>date("Y-m-d")])}}
            </div>

            <div class="form-group">
                {{Form::label('room','Plaats: ')}}
                {{Form::select('room', $rooms, null, ['placeholder' => 'Pick a Room...'])}}
            </div>

            <br><br>
            <div class="form-group">
                {{Form::label('eventstatus','Evenement Status')}}
                {{Form::select('eventstatus',['open'=> 'Open','Closed' => 'Gesloten', 'Unavailable'=>'niet beschikbaar'
                ],null)}}
            </div>

            <div class="form-group">
                {{Form::file('event_image')}}
            </div> 

            {{Form::submit('Opslaan', ['class'=>'btn btn-primary'])}}
            {!! Form::close() !!}
        </div>
    </div>
@endsection