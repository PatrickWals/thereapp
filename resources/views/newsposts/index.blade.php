@extends('_layouts.app')


@section('content')

<div class="container">
    <h1>Nieuws</h1>
</div>
<div class="container">
    @if(count($newsposts)>0)
    @foreach($newsposts as $newspost)
        <div class="container ">
        <h3><a href="newsposts/{{$newspost->id}}">{{$newspost->Title}}</a></h3>
            <p>{{$newspost->Body}}</p>
        </div>
    @endforeach
    @else
        <p>Op dit moment is er geen nieuws.</p>
    @endif
</div>


@endsection