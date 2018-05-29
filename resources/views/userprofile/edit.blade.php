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

<<<<<<< HEAD
                    <div class="form-group">
                        {{Form::select('futurelab', ['Flab1' => 'Flab1', 'Flab2' => 'Flab2', 'Flab3' => 'Flab3', 'Flab4' => 'Flab4', 'Flab5' => 'Flab5', 'Flab6' => 'Flab6'], null, ['placeholder' => 'Kies een Future Lab'])}}
                    </div>
                    
                    <div class="form-group">
                        {{Form::label('aboutme', 'Over mij')}}
                        {{Form::textarea('aboutme', $user->Aboutme_Str, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => ''])}}
                    </div>
                        
                    <div class="form-group">

                        @if(count($userinterests)==0)
                            @foreach($interests as $interest)
                                 {{Form::checkbox('interest[]', $interest->Interest_ID)}}
                                {{Form::label('interest[]', $interest->Interest_Name)}}
                            @endforeach
                        @else
                        @for($i = 0; $i < count($interests); $i++)
                            @for($j = 0; $j < count($userinterests); $j++)
                                @if($interests[$i]->Interest_ID > $userinterests[$j]->Interest_ID)

                                
                                @elseif($interests[$i]->Interest_ID == $userinterests[$j]->Interest_ID)

                                    {{-- {{$interest->Interest_ID}} = {{$userinterest->Interest_ID}} --}}
                                    {{Form::checkbox('interest[]', $interests[$i]->Interest_ID, true)}}
                                    {{Form::label('interest[]', $interests[$i]->Interest_Name)}}
                                    @break
                                    
                                @else
                                {{-- if($interests[$i]->Interest_ID > $userinterests[$j]->Interest_ID) --}}
                                    {{-- {{$interest->Interest_ID}} /= {{$userinterest->Interest_ID}} --}}
                                    {{Form::checkbox('interest[]', $interests[$i]->Interest_ID)}}
                                    {{Form::label('interest[]', $interests[$i]->Interest_Name)}}
                                                                      
                                @endif
                                
                            @endfor
                        @endfor
                        @endif
                        
                    </div>
=======
                    {{-- <div class="form-group">
                {{Form::label('body', 'Body')}}
                {{Form::textarea('body', $user->LastName, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
                    </div> --}}
                    <div class="form-group">
                         {{Form::file('profile_image')}}
                    </div>
                    
>>>>>>> TagwaS2
            {{Form::hidden('_method','PUT')}}
            {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
            {!! Form::close() !!}
            </div>      
        </div>
    </div>
</div>
@endsection