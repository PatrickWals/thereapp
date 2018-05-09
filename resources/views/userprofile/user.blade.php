@extends('_layouts.app')


@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-100">
        <div class="panel panel-default">
            <div class="panel-body text-left">
                <img src="http://www.personalbrandingblog.com/wp-content/uploads/2017/08/blank-profile-picture-973460_640-300x300.png">
                
                <h1>Naam: {{$user->Firstname}} {{$user->Lastname}}</h1>
                <h5>Telefoon nummer: {{$user->Phone}}</h5>
                <h5>Mobiel nummer: {{$user->Mobile}}</h5>
                <h5>E-mail adress:{{$user->Email}}</h5>
                
            </div>      
        </div>
    </div>
</div>
@endsection