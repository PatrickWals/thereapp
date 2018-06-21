@extends('_layouts.app')


@section('content')

<div class="row justify-content-center">
    <div class="col-md-8" >
        <a href="/newsposts" class="btn btn-primary">Go back</a>
        <div class="card">
            <div class="card-header">
                <h3><b>{{$newspost->Title}}</b></h3>
            </div>

            <div class="card-body">
                {{$newspost->Body}}
            </div>
            <small>Nieuwsbericht gemaakt op: {{$newspost->created_at}}</small>
        </div>          
        @if(!Auth::guest())
            @if($newspost->user_ID == Auth::user()->id)   
                <a href="/newsposts/{{$newspost->id}}/edit" class="btn btn-primary float-left">Edit</a>

                {!!Form::open(['action' => ['NewsPostController@destroy', $newspost->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                {!!Form::close()!!}   
            @endif
        @endif
    </div>
</div>

@endsection