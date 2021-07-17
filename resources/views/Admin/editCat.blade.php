@extends("Admin.navbar")

@section('title', 'Edit Category')

@section('content')
<div class="adminControls w-100 d-flex justify-content-center align-items-center">
    <form class="add p-4" method="POST" action="{{ url('/admin/cats/update', $cat->id) }}">
        @csrf
        <h2 class="text-center mb-3">Edit Category</h2>
        <div class="form-group w-100">
            <input type="test" class="form-control" name="cat_name" value="{{ $cat->cat_name }}">
        </div>
        <div class="form-group w-100">
            <textarea type="text" class="form-control" name="cat_desc" rows="4">{{ $cat->cat_desc }}</textarea>
        </div>
        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
@endsection 