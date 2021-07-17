@extends('Admin.navbar')

@section('title', 'Blogs')

@section('content')
    <div class="blogs w-100">
        <table class="table table-striped text-white m-auto text-center">
            @if (Session::has('blog_success'))
                <div class="alert alert-success">
                    {{ Session::get('blog_success') }}
                </div>
            @endif
            @if (Session::has('blog_update_success'))
                <div class="alert alert-success">
                    {{ Session::get('blog_update_success') }}
                </div>
            @endif
            @if (Session::has('blog_delete_success'))
                <div class="alert alert-danger">
                    {{ Session::get('blog_delete_success') }}
                </div>
            @endif
            <thead class="text-uppercase">
                <tr>
                    <th>Blog Title</th>
                    <th>Blog Category</th>
                    <th>controls</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $blog)
                    <tr>
                        <td>{{ $blog->title }}</td>
                        @foreach ($cats as $cat)
                            @if ($blog->category_id === $cat->id)
                                <td>{{ $cat->cat_name }}</td>
                            @endif
                        @endforeach
                        <td>
                            <a class="btn btn-warning text-white" href="{{ url('/admin/blogs/edit', $blog->id) }}">Edit</a>
                            <a class="btn btn-danger" href="{{ url('/admin/blogs/delete', $blog->id) }}" onclick="return confirm('Are you sure you want to delete {{ $blog->title }} ?')">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
