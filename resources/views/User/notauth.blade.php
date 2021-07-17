@extends("User.Layout")

@section('title', 'Notaouth')

@section('content')
<div class="row w-100 h-100">
    <div class="notaoth h-100 w-100 d-flex justify-content-center align-items-center flex-column">
        <h2><span class="notaouth_error">ERROR</span> | You don't have permission to visit this URL</h2>
        <a href="{{ url('/') }}" class="visit_site">Return to the website</a>
    </div>
<div>
@endsection