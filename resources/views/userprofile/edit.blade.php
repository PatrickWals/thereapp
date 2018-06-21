@extends('_layouts.app')


@section('content')
<h1>Edit page</h1>

<div class="row">
    <div class="col-md-8 col-md-offset-100">
        <div class="panel panel-default">
            <div class="panel-body text-left">
                <img src="http://www.personalbrandingblog.com/wp-content/uploads/2017/08/blank-profile-picture-973460_640-300x300.png">
                
                {!! Form::open(['action' => ['ProfileController@update', $user->Username], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    <div class="form-group">
                {{Form::label('firstname', 'Voornaam')}}
                {{Form::text('firstname', $user->Firstname, ['class' => 'form-control', 'placeholder' => ''])}}
                    </div>
                    
                    <div class="form-group">
                        {{Form::label('lastname', 'Achternaam')}}
                        {{Form::text('lastname', $user->Lastname, ['class' => 'form-control', 'placeholder' => ''])}}
                    </div>

                    <div class="form-group">
                        {{Form::label('phone', 'Telefoon nummer')}}
                        {{Form::text('phone', $user->Phone, ['class' => 'form-control', 'placeholder' => ''])}}
                    </div>

                    <div class="form-group">
                        {{Form::label('mobile', 'Mobiel nummer')}}
                        {{Form::text('mobile', $user->Mobile, ['class' => 'form-control', 'placeholder' => ''])}}
                    </div>

                    <div class="form-group">
                        {{Form::label('email', 'E-mail adress')}}
                        {{Form::text('email', $user->Email, ['class' => 'form-control', 'placeholder' => ''])}}
                    </div>

                    <div class="form-group">
                        {{Form::select('futurelab', ['Flab1' => 'Flab1', 'Flab2' => 'Flab2', 'Flab3' => 'Flab3', 'Flab4' => 'Flab4', 'Flab5' => 'Flab5', 'Flab6' => 'Flab6'], null, ['placeholder' => 'Kies een Future Lab'])}}
                    </div>
                    
                    <div class="form-group">
                        {{Form::label('aboutme', 'Over mij')}}
                        {{Form::textarea('aboutme', $user->Aboutme_Str, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => ''])}}
                    </div>
                        
                    <div class="form-group">
                        
                        {{Form::label('interests', 'Mijn intresses')}}
                        <br>
                        @foreach($interests as $interest)
                            {{Form::checkbox('interest[]', $interest->Interest_ID)}}
                            {{Form::label('interest[]', $interest->Interest_Name)}}
                        @endforeach
                        {{-- @for($x = 0; $x < count($interests); $x++)
                            
                        <input type="checkbox" id={{$x+1}} name = "interest[]" value= "{{$interests[$x]->Interest_ID}}" />
                        <label for="interests[]"></label>
                        @endfor --}}

                        @for($i = 0; $i < count($interests); $i++)
                            @for($j = 0; $j < count($userinterests); $j++)
                                
                                @if($interests[$i]->Interest_ID == $userinterests[$j]->Interest_ID)

                                @else

                                @endif
                                
                            @endfor
                        @endfor
                        
                        
                    </div>
                    <div class="form-group">
                        {{Form::label('specialities', 'Mijn specialiteiten')}}
                        <br>
                        @foreach($specialities as $speciality)
                        
                            {{Form::checkbox('speciality[]', $speciality->Speciality_ID)}}
                            {{Form::label('speciality[]', $speciality->Speciality_Name)}}
                        @endforeach
                    </div>
            {{Form::hidden('_method','PUT')}}
            {{Form::submit('verstuur', ['class'=>'btn btn-primary'])}}
            {!! Form::close() !!}
            </div>      
        </div>
    </div>
</div>
@endsection