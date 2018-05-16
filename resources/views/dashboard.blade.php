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
                            <a href="events/create">Create Event</a>
                           
                        </li>
                        <li>
                            <a href="newsposts/create">Create newspost</a>
                        </li>
                        <li>
                            <a href="reservations">List Reservations</a>
                        </li>                        
                    </ul>                        
                </div>
            </div>
        </div>
    </div>
</div>
@if(count($users)>0)
    @foreach($users as $user)
        <div class="container ">
            <h3><a href="/profile/{{$user->Username}}">{{$user->Firstname}} {{$user->Lastname}}</a></h3>
        </div>
    @endforeach
@else
@endif

@endsection
