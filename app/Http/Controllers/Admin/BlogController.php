<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Blogs;
use App\Models\Users;

class BlogController extends Controller
{
    /**
     * @method add_blog()
     * @return view -> add_blog
     */
    public function add_blog()
    {
        $cats = Categories::all();
        return view('Admin/addBlog', compact('cats'));
    }

    /**
     * @method newBlog()
     * @param Request $request
     * @return void
     */
    public function newBlog(Request $request)
    {
        $blog = new Blogs();
        if (isset($request->title))
        {
            $blog->title = $request->title;
        }
        if (isset($request->content))
        {
            $blog->content = $request->content;
        }
        if (isset($request->cat))
        {
            $blog->category_id = $request->cat;
        }
        if (isset($request->blog_img))
        {
            $img_name = time().'_'.$request->blog_img->getClientOriginalName();
            $img_path = $request->file('blog_img')->move('blogs_images', $img_name);
            $blog->image = $img_name;
        }
        else
        {
            $img_name = 'noimage.jpg';
            $blog->image = $img_name;
        }
        $blog->save();
        return redirect('/admin/blogs')->with('blog_success', 'Blog created successfully');
    }

    /**
     * @method blogs
     * @return view -> all blogs
     */
    public function blogs()
    {
        $blogs = Blogs::get();
        $cats = Categories::all();
        return view('Admin/blogs', compact(['blogs', 'cats']));
    }

    /**
     * @method edit
     * @return view -> form with category data
     */
    public function edit($id)
    {
        $blog = Blogs::where('id', $id)->first();
        $cats = Categories::get();
        if (! isset($blog->id))
        {
            return 'notfound';
        }
        return view('Admin/editBlog', compact(['blog', 'cats']));
    }
    
    /**
     * @method update()
     * @param Request $request
     * @return void
     */
    public function update(Request $request, $id)
    {
        $blog = Blogs::where('id', $id)->first();
        if (isset($request->title))
        {
            $blog->title = $request->title;
        }
        if (isset($request->content))
        {
            $blog->content = $request->content;
        }
        if (isset($request->cat))
        {
            $blog->category_id = $request->cat;
        }
        if (isset($request->blog_img))
        {
            $img_name = time().'_'.$request->blog_img->getClientOriginalName();
            $img_path = $request->file('blog_img')->move('blogs_images', $img_name);
            $blog->image = $img_name;
        }
        else
        {
            $old_name = $blog->image;
            $blog->image = $old_name;
        }
        $blog->save();
        return redirect('/admin/blogs')->with('blog_update_success', 'Blog updated successfully');
    }

    /**
     * @method delete
     * @return redirect -> blogs
     */
    public function delete($id)
    {
        $blog = Blogs::where('id', $id)->first();
        if (! isset($blog->id))
        {
            return 'notfound';
        }
        $blog->delete();
        return redirect('/admin/blogs')->with('blog_delete_success', 'Blog deleted successfully');
    }


}
