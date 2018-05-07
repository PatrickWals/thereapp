@extends('_layouts.app')


@section('content')

<h1>Reserveringen</h1>

@if(count($reservations)>0)
    @foreach($reservations as $reservation)
        
    @endforeach
@else
    <p>Op het moment heeft u geen reserveringen</p>
@endif
<a href="/reservations/create" class="btn btn-primary">Maak Reservering</a>
@endsection