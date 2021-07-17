@extends("User.navbar")
@section('title', 'Home')

@section('content')
<div class="row">
    @foreach ($blogs as $blog)
        <div class="blog col-md-4 my-3">
            <a href="{{ url('/blog', $blog->id) }}" class="blogLink" target="_blank">
                <div class="card">
                    <div class="img_div">
                        <img class="card-img-top blog_img img-fluid" name="blog_img" src="{{ url('blogs_images', $blog->image) }}" alt="blog image">
                    </div>
                    <div class="card-body">
                        <h4 class="card-title text-center">{{ $blog->title }}</h4>
                        <p class="card-text content">{{ substr($blog->content, 0, 80) }} ......</p>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
</div>
@endsection
