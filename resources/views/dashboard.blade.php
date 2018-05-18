@extends('_layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    Welkom {{Auth::user()->name}}
                    <ul>
                        <li>
                            <a href="events/create">Create Event BROKEN</a>
                           
                        </li>
                        <li>
                            <a href="newsposts/create">Create newspost</a>
                        </li>
                        <li>
                            <a href="reservations">List Reservations</a>
                        </li>
                        <li>
                            <a href="rooms">lijst ruimtes</a>
                        </li>
                        <li>
                            <a href="rooms/create">Create Room</a>
                        </li>                        
                    </ul>                        
                </div>
            </div>
        </div>
    </div>
</div>
@if(count($users)>0)
    <h4>Online gebruikers:</h4>
    @foreach($users as $user)
        @if($user->Status_Str == "Online")
            <div class="container">
            <h5><a href="/profile/{{$user->Username}}">{{$user->Firstname}} {{$user->Lastname}}</a>{{$user->Status_Str}}</h5>
            </div>
        @endif
    @endforeach
    <h4>Offline gebruikers</h4>
    @foreach($users as $user)
        @if($user->Status_Str == "Offline")
            <div class="container">
            <h5><a href="/profile/{{$user->Username}}">{{$user->Firstname}} {{$user->Lastname}}</a>{{$user->Status_Str}}</h5>
            </div>
        @endif
    @endforeach
@else
@endif

@endsection
