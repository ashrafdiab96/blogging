<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;

class CategoryController extends Controller
{
    /**
     * @method add_cat()
     * @return view -> add_cat
     */
    public function add_cat()
    {
        return view('Admin/addCategory');
    }

    /**
     * @method newCategory()
     * @param Request $request
     * @return void
     */
    public function newCategory(Request $request)
    {
        $cat = new Categories();
        if (isset($request->cat_name))
        {
            $cat->cat_name = $request->cat_name;
        }
        if (isset($request->cat_desc))
        {
            $cat->cat_desc = $request->cat_desc;
        }
        $cat->save();
        return redirect('/admin/cats')->with('cat_success', 'Category created successfully');
    }

    /**
     * @method cat
     * @return view -> all categories
     */
    public function cats()
    {
        $cats = Categories::get();
        return view('Admin/cats', compact('cats'));
    }

    /**
     * @method edit
     * @return view -> form with category data
     */
    public function edit($id)
    {
        $cat = Categories::where('id', $id)->first();
        if (! isset($cat->id))
        {
            return 'notfound';
        }
        return view('Admin/editCat', compact('cat'));
    }

    /**
     * @method update
     * @return redirect -> to all categories
     */
    public function update(Request $request, $id)
    {
        $cat = Categories::where('id', $id)->first();
        if (! isset($cat->id))
        {
            return 'notfound';
        }
        if (isset($cat->cat_name))
        {
            $cat->cat_name = $request->cat_name;
        }
        if (isset($cat->cat_desc))
        {
            $cat->cat_desc = $request->cat_desc;
        }
        $cat->save();
        return redirect('/admin/cats')->with('cat_update_success', 'Category updated successfully');
    }

    /**
     * @method delete
     * @return redirect -> categories
     */
    public function delete($id)
    {
        $cat = Categories::where('id', $id)->first();
        if (! isset($cat->id))
        {
            return 'notfound';
        }
        $cat->delete();
        return redirect('/admin/cats')->with('cat_delete_success', 'Category deleted successfully');
    }

}
