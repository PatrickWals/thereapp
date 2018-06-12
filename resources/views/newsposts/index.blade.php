@extends('_layouts.app')


@section('content')

<div class="container">
    <h1>Nieuws</h1>
    <div class="form-group float-right">
        {{Form::select('futurelab',['Flab1' => 'Flab1','Flab2' => 'Flab2',
        'Flab3' => 'Flab3','Flab4' => 'Flab4','Flab5' => 'Flab5','Flab6' => 'Flab6'
        ],null,['class'=>'float-right'])}}
    </div>
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
        <p>Op dit moment is er geen nieuws</p>
    @endif
</div>


@endsection