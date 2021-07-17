@extends("Admin.navbar")

@section('title', 'Edit Blog')

@section('content')
<div class="adminControls w-100 d-flex justify-content-center align-items-center">
    <form class="add p-4" method="POST" action="{{ url('/admin/blogs/update', $blog->id) }}" enctype="multipart/form-data">
        @csrf
        <h2 class="text-center mb-3">Edit Blog</h2>
        <div class="form-group w-100">
            <input type="test" class="form-control" name="title" value="{{ $blog->title }}">
        </div>
        <div class="form-group w-100">
            <input type="file" class="form-control image_file" name="blog_img">
        </div>
        <div class="form-group w-100">
            <select name="cat" class="form-control">
                @foreach ($cats as $cat)
                    <option value="{{ $cat->id }}" {{ $blog->category_id === $cat->id ? 'selected' : '' }}>{{ $cat->cat_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group w-100">
            <textarea type="text" class="form-control" name="content" rows="4">{{ $blog->content }}</textarea>
        </div>
        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
@endsection
