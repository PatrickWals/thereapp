@extends('_layouts.app')


@section('content')

<h1>News</h1>

@if(count($newsposts)>0)
    @foreach($newsposts as $newspost)
        <div class="container ">
        <h3><a href="newsposts/{{$newspost->id}}">{{$newspost->title}}</a></h3>
            <p>{{$newspost->body}}</p>
        </div>
    @endforeach
@else
    <p>Op dit moment is er geen nieuws</p>
@endif

@endsection