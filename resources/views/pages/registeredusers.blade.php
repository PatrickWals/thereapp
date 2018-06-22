@extends('_layouts.app')

@section('content')

<h1>Gebruikers</h1>
@if(count($users)>0)
<div class="container">
    <ul>
        @foreach($users as $user)
            <li>
                <a href="/profile/{{$user->Username}}">{{$user->Username}}</a>
            </li>
        @endforeach
    </ul>
</div>   
@else 
    Op dit moment zijn er er geen geregistreerde gebruikers.
@endif

@endsection()