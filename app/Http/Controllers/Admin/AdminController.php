<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Blogs;
use App\Models\Categories;
use Session;
class AdminController extends Controller
{

    /**
     * @method login()
     * @return view -> dashboard
     */
    public function dashboard()
    {
        $users = User::all();
        $blogs = Blogs::all();
        $cats = Categories::all();
        return view('Admin/dashboard', compact(['users', 'blogs', 'cats']));
    }

    /**
     * @method login()
     * @return view -> login form
     */
    public function login()
    {
        if (Session::has('admin'))
        {
            return redirect('/dashboard');
        }
        else
        {
            return view('Admin/login');
        }
    }

    /**
     * @method handleLogin()
     * @return redirect -> dashboard
     */
    public function handleLogin(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user)
        {
            if (Hash::check($request->password, $user->password))
            {
                if ($user->is_admin === 1)
                {
                    Session::put('admin', $user);
                    return redirect('/dashboard');
                } else {
                    return redirect('/');
                }
            }
            else
            {
                return back()->with('admin_error_login', 'Invalid email or password');
            }
        }
        else
        {
            return back()->with('admin_error_login', 'Invalid email or password');
        }
    }

    /**
     * @method logout()
     * @return view -> home page
     */
    public function logout()
    {
        if (Session::has('admin'))
        {
            Session::forget('admin');
            return redirect('/admin/login');
        }
        return redirect('/');
    }

}
