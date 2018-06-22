@extends('_layouts.app')


@section('content')

<h1>Admin Pagina</h1>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <h5>interesses of specialiteiten toevoegen</h5>
                {!! Form::open(['action' => 'PagesController@addData', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    <div class="form-group">
                        {{Form::text('data', '', ['class' => 'form-control', 'placeholder' => ''])}}
                        {{Form::label('Interest','Interesse' )}}
                        {{Form::radio('Picker', 'Interest', true)}}
                        {{Form::label('special','Specialiteit' )}}
                        {{Form::radio('Picker', 'Speciality', false)}}
                
                        {{Form::submit('Toevoegen', ['class'=>'btn btn-primary float-right'])}}

                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@endsection