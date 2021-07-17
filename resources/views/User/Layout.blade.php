<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">

    {{-- My Style CSS --}}
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

    <!-- Icon -->
    <link rel="icon" href="{{asset('assets/images/icon.png')}}">

</head>
<body>

    <div class="container-fluid h-100 w-100">
        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="{{ asset('/assets/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>

</body>
</html>