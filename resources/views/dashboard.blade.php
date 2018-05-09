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
@endsection
