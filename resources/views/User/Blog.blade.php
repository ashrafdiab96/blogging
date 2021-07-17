@extends("User.navbar")
@section('title', $blog->title)

@section('content')
    <div class="row w-100 h-100">
        <div class="the_blog d-flex justify-content-center align-items-center flex-column my-4">
            <div class="blog_img">
                <img src="{{ url('blogs_images', $blog->image) }}" alt="">
            </div>
            <div class="blog_content mt-4">
                <h3 class="text-center">{{ $blog->title }}</h3>
                <p class="p-4">{{ $blog->content}}</p>
            </div>
        </div>

        <div class="blog_comments d-flex justify-content-center align-items-center flex-column">
            <div class="comments mb-5 p-5">
                @foreach ($comments as $comment)
                    @if ($comment->blog_id === $blog->id)
                        <div class="the_comment">
                            <div class="user">
                                @foreach ($users as $user)
                                    @if ($user->id === $comment->user_id)
                                        <h4>{{ $user->fname }} {{ $user->lname }}</h4>
                                    @endif
                                @endforeach
                                @if (Session::has('user') && Session::get('user')->id === $comment->user_id)
                                    <div class="controls">
                                        <a href="{{ url('blog/'.$blog->id.'/comment/edit'.'/'.$comment->id) }}" class="btn btn-warning text-white">Edit</a>
                                        <a href="{{ url('comment/delete', $comment->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this comment ?')">Delete</a>
                                    </div>
                                @endif
                            </div>
                            <div class="user_comment">
                                <p>{{ $comment->comment }}</p>
                            </div>
                        </div>
                        <hr>
                    @endif
                @endforeach

                @if (Session::has('user'))
                    <form class="comment" method="post" action="{{ url('/comment', $blog->id) }}">
                        @csrf
                        <textarea name="comment" rows="3" class="your_comment" placeholder="Enter Your Comment"></textarea>
                        <div class="share_comment text-center mt-3">
                            <button class="btn btn-info">Share Comment</button>
                        </div>
                    </form>
                @else
                    <div class="login_to_comment text-center">
                        <a href="{{ url('/login') }}">Login to be able to comment</a>
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection

