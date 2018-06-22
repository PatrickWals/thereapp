@extends('_layouts.app')


@section('content')
    
<h1>Newspost editor</h1>
    <div class="row justify-content-center">
        
        <div class="col-md-8 ">
            <a href="/dashboard" class="btn btn-primary">Ga terug</a>

            {!! Form::open(['action' => 'NewsPostController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

            <div class="form-group">
                {{Form::label('title', 'Titel')}}
                {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
            </div>

            <div class="form-group">
                {{Form::label('body', 'Nieuwsbericht')}}
                {{Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => ''])}}
            </div>


            <div class="form-group">
                {{Form::label('futurelab','FutureLab')}}
                {{Form::select('futurelab',['Flab1' => 'Flab1','Flab2' => 'Flab2',
                'Flab3' => 'Flab3','Flab4' => 'Flab4','Flab5' => 'Flab5','Flab6' => 'Flab6'
                ],null)}}
            </div>  

            <div class="form-group">
                {{Form::label('newsstatus','Nieuwsbericht status')}}
                {{Form::select('newsstatus',['Available' => 'Beschikbaar','Unavailable' => 'Niet Beschikbaar'
                ],null)}}
            </div>

            <div class="form-group">
                {{Form::file('news_Pic')}}
            </div>

            {{Form::submit('Opslaan', ['class'=>'btn btn-primary'])}}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
