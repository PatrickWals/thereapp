@extends('_layouts.app')

@section('content')

@if($newspost->user_ID ==Auth::user()->id)
<h1>Nieuwsbericht bewerken</h1>
    <div class="row justify-content-center">
        
        <div class="col-md-8 ">
            <a href="/newsposts/{{$newspost->id}}" class="btn btn-primary">Ga terug</a>
            {!! Form::open(['action' => ['NewsPostController@update', $newspost->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

            <div class="form-group">
                {{Form::label('title', 'Titel')}}
                {{Form::text('title', $newspost->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
            </div>

            <div class="form-group">
                {{Form::label('body', 'Nieuwsbericht:')}}
                {{Form::textarea('body', $newspost->body, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
            </div>

            <div class="form-group">
                {{Form::label('futurelab','FutureLab')}}
                {{Form::select('futurelab',['Flab1' => 'Flab1','Flab2' => 'Flab2',
                'Flab3' => 'Flab3','Flab4' => 'Flab4','Flab5' => 'Flab5','Flab6' => 'Flab6'
                ],$newspost->Futurelab_Str)}}
            </div>

            <div class="form-group">
                {{Form::label('newsstatus','Nieuwsbericht status')}}
                {{Form::select('newsstatus',['Available' => 'Beschikbaar','Unavailable' => 'Niet Beschikbaar'
                ],$newspost->News_status)}}
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
    <h1 class="title center">Toegang geweigerd je wordt terug gestuurd</h1>

<script>
    function redirect()
    {    
        window.location.replace("/accesdenied");
    }
    redirect();    
</script>

@endif

@endsection