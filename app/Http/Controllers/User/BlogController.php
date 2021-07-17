<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blogs;
use App\Models\Comments;
use App\Models\User;
use App\Models\Categories;
use Session;

class BlogController extends Controller
{
    /**
     * @method blog()
     * Show specific blog by id
     * @return view -> blog
     */
    public function blog($id)
    {
        $cats = Categories::get();
        $blog = Blogs::where('id', $id)->first();
        $comments = Comments::get();
        $users = User::get();
        return view('User/blog', compact(['blog', 'comments', 'users', 'cats']));
    }

    /**
     * @method comment()
     * @param $id -> refers to blog id
     * Handle comment to blogs
     * @return back
     */
    public function comment(Request $request)
    {
        $blogId = $request->route('id');
        $userId = Session::get('user')->id;
        if (isset($request->comment))
        {
            $comment = new Comments();
            $comment->comment = $request->comment;
            $comment->user_id = $userId;
            $comment->blog_id = $blogId;
            $comment->save();
        }
        return back();
    }

    /**
     * U@method edit_comment()
     * edit the comment
     * @return void
     */
    public function edit_comment(Request $request)
    {
        $cats = Categories::get();
        $comment_id = $request->route('comment_id');
        $blog_id = $request->route('blog_id');
        $editComment = Comments::where('id', $comment_id)->first();
        $blog = Blogs::where('id', $blog_id)->first();
        return view('User/editComment', compact(['editComment', 'blog', 'cats']));
    }

    /**
     * U@method update_comment()
     * Handle edit comment
     * @return void
     */
    public function update_comment(Request $request)
    {
        $comment_id = $request->route('comment_id');
        $blog_id = $request->route('blog_id');
        $comment = Comments::where('id', $comment_id)->first();
        $blog = Blogs::where('id', $blog_id)->first()->id;
        if (isset($request->comment_edited))
        {
            $comment->comment = $request->comment_edited;
            $comment->save();
        }
        return redirect('blog/'.$blog);
    }

    /**
     * @method delete_comment()
     * delete comment
     * @return void
     */
    public function delete_comment($id)
    {
        $comment = Comments::where('id', $id)->first();
        if (isset($comment))
        {
            $comment->delete();
        }
        return back();
    }

}
