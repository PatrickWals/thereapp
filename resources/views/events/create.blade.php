@extends('_layouts.app')


@section('content')
    
<h1>Event Editor</h1>
    <div class="row justify-content-center">
        
        <div class="col-md-8 ">
            <a href="/dashboard" class="btn btn-primary">Go back</a>

            {!! Form::open(['action' => 'EventController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {{Form::label('title', 'Title')}}
                {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
            </div>
            <div class="form-group">
                {{Form::label('body', 'Body')}}
                {{Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
            </div>
            <div class="form-group">
                {{Form::file('event_image')}}
            </div> 
            {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
        </div>
    </div>
@endsection