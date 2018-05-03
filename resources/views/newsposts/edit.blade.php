@extends('_layouts.app')



@section('content')
    

@if($newspost->user_ID ==Auth::user()->id)
<h1>Newspost Editor</h1>
    <div class="row justify-content-center">
        
        <div class="col-md-8 ">
            <a href="/newsposts/{{$newspost->id}}" class="btn btn-primary">Go back</a>
            {!! Form::open(['action' => ['NewsPostController@update', $newspost->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {{Form::label('title', 'Title')}}
                {{Form::text('title', $newspost->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
            </div>
            <div class="form-group">
                {{Form::label('body', 'Body')}}
                {{Form::textarea('body', $newspost->body, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
            </div>

            <div class="form-group">
                
            </div>
            {{-- <div class="form-group">
                {{Form::file('cover_image')}}
            </div> --}}
            {{Form::hidden('_method','PUT')}}
            {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
            {!! Form::close() !!}
        </div>
    </div>
@else
    <h1 class="title center">Acces Denied You will be redirected</h1>

<script>
    
    function redirect(){
        
        window.location.replace("/accesdenied");
    }
    redirect();
    
</script>

@endif

@endsection