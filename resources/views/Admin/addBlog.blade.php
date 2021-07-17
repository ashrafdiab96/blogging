@extends("Admin.navbar")

@section('title', 'Add Blog')

@section('content')
<div class="adminControls w-100 d-flex justify-content-center align-items-center">
    <form class="add p-4" method="POST" action="{{ url('/admin/new_blog') }}" enctype="multipart/form-data">
        @csrf
        <h2 class="text-center mb-3">Add Blog</h2>
        <div class="form-group w-100">
            <input type="test" class="form-control" name="title" placeholder="Blog Title">
        </div>
        <div class="form-group w-100">
            <input type="file" class="form-control image_file" name="blog_img">
        </div>
        <div class="form-group w-100">
            <select name="cat" class="form-control">
                <option value="" disabled selected>Category</option>
                @foreach ($cats as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->cat_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group w-100">
            <textarea type="text" class="form-control" name="content" placeholder="Blog Content" rows="4"></textarea>
        </div>
        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
    </form>
</div>
@endsection
