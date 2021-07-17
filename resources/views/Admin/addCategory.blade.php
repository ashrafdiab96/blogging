@extends("Admin.navbar")

@section('title', 'Add Category')

@section('content')
<div class="adminControls w-100 d-flex justify-content-center align-items-center">
    <form class="add p-4" method="POST" action="{{ url('/admin/new_cat') }}">
        @csrf
        <h2 class="text-center mb-3">Add Category</h2>
        @if (Session::has('cat_success'))
            <div class="alert alert-success">
                {{ Session::get('cat_success') }}
            </div>
        @endif
        <div class="form-group w-100">
            <input type="test" class="form-control" name="cat_name" placeholder="Category Name">
        </div>
        <div class="form-group w-100">
            <textarea type="text" class="form-control" name="cat_desc" placeholder="Category Description" rows="4"></textarea>
        </div>
        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
    </form>
</div>
@endsection 