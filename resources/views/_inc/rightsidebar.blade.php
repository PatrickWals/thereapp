

<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="#">
                    <span data-feather="home"></span>
                    Dashboard <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file"></span>
                    Orders
                </a>
            </li>
        </ul>
        <ul class="nav flex-column mb-2">
            {{-- @if(count($users)>0)
                @foreach($users as $user)
                    <div class="container ">
                        <h3><a href="/profile/{{$user->Username}}">{{$user->Firstname}} {{$user->Lastname}}</a></h3>
                    </div>
                @endforeach
            @else
            @endif --}}
        </ul>
    </div>
</nav>
