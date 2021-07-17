@extends("User.Layout")

<nav class="navbar navbar-expand-sm navbar-light bg-light">
    <a class="navbar-brand">Blogging</a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
            </li>
            @foreach ($cats as $cat)
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('category/'.$cat->id) ? 'active' : '' }}" href="{{ url('/category', $cat->id) }}">{{ $cat->cat_name }}</a>
                </li>
            @endforeach
        </ul>
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            @if (Session::has('user'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/logout') }}">Logout</a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/register') }}">Sign Up</a>
                </li>
            @endif
        </ul>
    </div>
</nav>
