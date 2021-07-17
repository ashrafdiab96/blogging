@extends("Admin.layout")

<nav class="navbar navbar-expand-sm navbar-light bg-light">
    <a class="navbar-brand" href="{{ url('/dashboard') }}">Blogging</a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="{{ url('/dashboard') }}">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/users') ? 'active' : '' }}" href="{{ url('/admin/users') }}">Users</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/cats') ? 'active' : '' }}" href="{{ url('/admin/cats') }}">Categories</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/blogs') ? 'active' : '' }}" href="{{ url('/admin/blogs') }}">Blogs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/add_cat') ? 'active' : '' }}" href="{{ url('/admin/add_cat') }}">Add Category</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/add_blog') ? 'active' : '' }}" href="{{ url('/admin/add_blog') }}">Add Blog</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            @if (Session::has('admin'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/admin/logout') }}">Logout</a>
                </li>
            @endif
        </ul>
    </div>
</nav>
