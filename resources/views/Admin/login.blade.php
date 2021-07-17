@extends('Admin.layout')
@section('title', 'Admin - Login')

@section('content')
<div class="registerContainer d-flex justify-content-center align-items-center">
    <form class="register p-4" method="POST" action="{{ url('/admin/handleLogin') }}">
        @csrf
        <h2 class="text-center mb-3">Admin Login</h2>
        @if (Session::has('admin_error_login'))
            <div class="alert alert-danger">
                {{ Session::get('admin_error_login') }}
            </div>
        @endif
        <div class="form-group w-100">
            <input type="email" class="form-control" name="email" placeholder="Email">
        </div>
        <div class="form-group w-100">
            <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary">Login</button>
        </div>
        <div class="form-group text-center">
            <a href="{{ url('/') }}">Visit Website</a>
        </div>
    </form>
</div>
@endsection