@extends('_layouts.app')


@section('content')

<h1>Admin Pagina</h1>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h5>interesses toevoegen</h5>
                    {{Form::text('addinterest', '', ['class' => 'form-control', 'placeholder' => 'left'])}}
                    {{Form::submit('Interesse toevoegen', ['class'=>'btn btn-primary float right'])}}
                <h5>specialiteiten toevoegen</h5>
                    {{Form::text('addspeciality', '', ['class' => 'form-control', 'placeholder' => 'left'])}}
                    {{Form::submit('Specialiteiten toevoegen', ['class'=>'btn btn-primary float right'])}}
            </div>
        </div>
    </div>
</div>

@endsection