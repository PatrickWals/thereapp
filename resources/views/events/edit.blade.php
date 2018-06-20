@extends('_layouts.app')

@section('content')  

@if($event->user_ID ==Auth::user()->id)

<h1>Post Editor</h1>

    <div class="row justify-content-center">
        
        <div class="col-md-8 ">
            <a href="/events/{{$event->Event_ID}}" class="btn btn-primary">Go back</a>
            {!! Form::open(['action' => ['EventController@update', $event->Event_ID], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

            <div class="form-group">
                {{Form::label('eventname', 'Eventname')}}
                {{Form::text('eventname', $event->Eventname, ['class' => 'form-control', 'placeholder' => 'Title'])}}
            </div>

            <div class="form-group">
                {{Form::label('body', 'Body')}}
                {{Form::textarea('body', $event->Description, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
            </div>

            <div class="form-group">
                {{Form::label('futurelab','FutureLab')}}
                {{Form::select('futurelab',['Flab1' => 'Flab1','Flab2' => 'Flab2',
                'Flab3' => 'Flab3','Flab4' => 'Flab4','Flab5' => 'Flab5','Flab6' => 'Flab6'
                ],$event->Futurelab_Str)}}
            </div> 

            <h3>Datum en plaats</h3>
            
            <div class="form-group">
                {{Form::label('eventdate', 'Datum: ')}}
                {{Form::date('eventdate','', ['class' => 'form-control', 'placeholder' => '','min' =>date("Y-m-d")])}}
            </div>
            
            <div class="form-group">
                {{Form::label('room','Plaats: ')}}
                {{Form::select('room', $rooms, null, ['placeholder' => 'Pick a Room...'])}}
            </div>
            
            <br><br>
            <div class="form-group">
                {{Form::label('eventstatus','Event Status')}}
                {{Form::select('eventstatus',['open'=> 'Open','Closed' => 'Gesloten', 'Unavailable'=>'niet beschikbaar'
                ],$event->Event_status)}}
            </div>

            <div class="form-group">
                {{Form::file('cover_image')}}
            </div>
            
            {{Form::hidden('_method','PUT')}}
            {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
            {!! Form::close() !!}
        </div>
    </div>
@else

<script>    
    function redirect(){
        window.location.replace("/accesdenied");
    }
    
    alert("You don't have the required permissions");
    redirect();   
</script>

@endif

@endsection