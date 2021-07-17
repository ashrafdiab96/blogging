@extends("User.navbar")
@section('title', 'Edit Comment')

@section('content')
    <div class="row w-100 h-100">
        <div class="blog_comments d-flex justify-content-center align-items-center flex-column">
            <div class="comments mb-5 p-5">
                @if (Session::has('user'))
                    <form class="comment" method="post" action="{{ url('blog/'.$blog->id.'/comment/update'.'/'.$editComment->id) }}">
                        @csrf
                        <textarea name="comment_edited" rows="3" class="your_comment">{{ $editComment->comment }}</textarea>
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

