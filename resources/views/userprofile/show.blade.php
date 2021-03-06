@extends('_layouts.app')


@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-100">
        <div class="panel panel-default">
            <div class="panel-body text-left">
                <img src="http://www.personalbrandingblog.com/wp-content/uploads/2017/08/blank-profile-picture-973460_640-300x300.png">
                
                <h2>Voornaam: {{$user->Firstname}} </h2>
                <h2>achternaam: {{$user->Lastname}}</h2>
                <h5>Telefoon nummer: {{$user->Phone}}</h5>
                <h5>Mobiel nummer: {{$user->Mobile}}</h5>
                <h5>E-mail adress: {{$user->Email}}</h5>
                <h5>Future lab: {{$user->Futurelab_Str}}</h5>
                <h5>About me: <br><br> {{$user->Aboutme_Str}}</h5>
                <div class="form-group">
                    <h5>Mijn intresses</h5>    
                    
                    @foreach($interests as $interest)
                        
                        {{Form::label('interest[]', $interest->Interest_Name)}}

                    @endforeach
                    <br>
                    <h5>Mijn specialiteiten</h5>
                    
                    @foreach($specialities as $speciality)
                    
                        {{Form::label('speciality[]', $speciality->Speciality_Name)}}

                    @endforeach
                </div>
        
                @if(auth::user()->User_ID == $user->User_ID)
                <a href="/profile/{{$user->Username}}/edit" class="btn btn-primary">bewerk profiel</a>
                @endif
            </div>      
        </div>
    </div>
</div>

@endsection