@extends('_layouts.app')


@section('content')

<h1>Admin Pagina</h1>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h5>interesses toevoegen</h5>
                {!! Form::open(['action' => 'PagesController@addInterest' , 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    <div class="form-group">
                    {{Form::text('addInterest', '', ['class' => 'form-control', 'placeholder' => ''])}}
                    {{Form::submit('Interesse toevoegen', ['class'=>'btn btn-primary float right'])}}
                    </div>
                {!! Form::close() !!}
                <h5>specialiteiten toevoegen</h5>
                {!! Form::open(['action' => 'PagesController@update', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    <div class="form-group">
                    {{Form::text('addSpeciality', '', ['class' => 'form-control', 'placeholder' => ''])}}
                    {{Form::submit('Specialiteiten toevoegen', ['class'=>'btn btn-primary float right'])}}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@endsection