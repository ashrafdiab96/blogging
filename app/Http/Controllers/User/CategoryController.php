<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Blogs;

class CategoryController extends Controller
{
    public function category($id)
    {
        $blogs = Blogs::get();
        $cats = Categories::get();
        $cat = Categories::where('id', $id)->first();
        return view('User/blogByCat', compact(['cat', 'cats', 'blogs']));
    }
}
