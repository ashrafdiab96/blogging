@extends("User.Layout")
@section('title', 'Login')

@section('content')
<div class="row h-100">
    <div class="registerContainer d-flex justify-content-center align-items-center">
        <form class="register p-4" method="POST" action="{{ url('/handleLogin') }}">
            @csrf
            <h2 class="text-center mb-3">Login</h2>
            @if (Session::has('created'))
                <div class="alert alert-success">
                    {{ Session::get('created') }}
                </div>
            @endif
            @if (Session::has('error_login'))
                <div class="alert alert-danger">
                    {{ Session::get('error_login') }}
                </div>
            @endif
            <div class="form-group w-100">
                <input type="email" class="form-control" name="email" placeholder="Email">
                <span class="required">*</span>
            </div>
            <div class="form-group w-100">
                <input type="password" class="form-control" name="password" placeholder="Password">
                <span class="required">*</span>
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-success">Login</button>
            </div>
            <hr>
            <div class="form-group">
                <a href="{{ url('/register') }}">Don't have an account, Register now</a>
                <br>
                <a href="{{ url('/') }}">Visit Website</a>
            </div>
        </form>
    </div>
</div>
@endsection
