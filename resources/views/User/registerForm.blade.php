@extends("User.Layout")
@section('title', 'Register')

@section('content')
<div class="row h-100">
    <div class="registerContainer d-flex justify-content-center align-items-center">
        <form class="register p-4" method="POST" action="{{ url('/handleRegister') }}">
            @csrf
            <h2 class="text-center mb-3">Register</h2>
            @if (Session::has('invalid_fname'))
                <div class="alert alert-danger">
                    <ul>
                        <li>First name is required</li>
                        <li>First name must be at least 3 digits</li>
                    </ul>
                </div>
            @endif
            @if (Session::has('invalid_email'))
                <div class="alert alert-danger">
                    <ul>
                        <li>Please, enter valid email</li>
                    </ul>
                </div>
            @endif
            @if (Session::has('invalid_pass'))
                <div class="alert alert-danger">
                    <ul>
                        <li>Password is required</li>
                        <li>Password must be at least 6 digits</li>
                    </ul>
                </div>
            @endif
            @if (Session::has('invalid_agree'))
                <div class="alert alert-danger">
                    <ul>
                        <li>You must agree our terms</li>
                    </ul>
                </div>
            @endif
            @if (Session::has('Already_exit'))
                <div class="alert alert-danger">
                    {{ Session::get('Already_exit') }}
                </div>
            @endif
            <div class="form-group w-100">
                <input type="text" class="form-control" name="fname" placeholder="First Name">
                <span class="required">*</span>
            </div>
            <div class="form-group w-100">
                <input type="text" class="form-control" name="lname" placeholder="Last Name">
            </div>
            <div class="form-group w-100">
                <input type="email" class="form-control" name="email" placeholder="Email">
                <span class="required">*</span>
            </div>
            <div class="form-group w-100">
                <input type="password" class="form-control" name="password" placeholder="Password">
                <span class="required">*</span>
            </div>
            <div class="form-group m-right">
                <input type="checkbox" name="agree" value="agree">
                <label class="checkLabel">By register, you agree our terms</label>
                <span class="requiredBox">*</span>
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-success">Register</button>
            </div>
            <hr>
            <div class="form-group">
                <a href="{{ url('/login') }}">Already have an account, Login</a>
                <br>
                <a href="{{ url('/') }}">Visit Website</a>
            </div>
        </form>
    </div>
</div>
@endsection
