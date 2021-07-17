<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;
use App\Models\Blogs;
use App\Models\User;
use App\Models\Categories;

class UserController extends Controller
{
    /**
     * @method home()
     * @return view -> home page with all blogs
     */
    public function home()
    {
        $blogs = Blogs::get();
        $cats = Categories::get();
        return view("User/Home", compact(['blogs', 'cats']));
    }

    /**
     * @method register()
     * @return view -> register form
     */
    public function register()
    {
        if (Session::has('user'))
        {
            return redirect('/');
        }
        else
        {
            return view('User/registerForm');
        }
    }

    /**
     * @method handleRegister()
     * Create new account
     * @return redirect -> login form
     */
    public function handleRegister(Request $request)
    {
        $existUser = User::where('email', $request->email)->first();
        $validator = Validator::make($request->all(), [
            'fname' => 'required|min:3|max:20',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'agree' => 'required'
        ]);
        if ($validator->fails())
        {
            $errors = $validator->errors();
            $errs = $errors->toArray();
            if (isset($errs['fname'][0]))
            {
                return back()->with('invalid_fname', '');
            }
            else if (isset($errs['email'][0]))
            {
                return back()->with('invalid_email', '');
            }
            else if (isset($errs['password'][0]))
            {
                return back()->with('invalid_pass', '');
            }
            else if (isset($errs['agree'][0]))
            {
                return back()->with('invalid_agree', '');
            }
        }
        if ($validator->passes())
        {
            $user = new User();
            if (isset($request->fname))
            {
                $user->fname = $request->fname;
            }
            if (isset($request->lname))
            {
                $user->lname = $request->lname;
            }
            if (isset($request->email))
            {
                if (!$existUser) {
                    $user->email = $request->email;
                }
                else
                {
                    return back()->with('Already_exit', 'This email is already exists in database !');
                }
            }
            if (isset($request->password))
            {
                $user->password = bcrypt($request->password);
            }
            $user->is_admin = 0;
            $user->save();
            return redirect('/login')->with('created', 'Your account created successfully !');
        }
    }

    /**
     * @method login()
     * @return view -> login form
     */
    public function login()
    {
        if (Session::has('user'))
        {
            return redirect('/');
        }
        else
        {
            return view('User/loginForm');
        }
    }

    /**
     * @method handleLogin()
     * @return redirect -> home page
     */
    public function handleLogin(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user)
        {
            if (Hash::check($request->password, $user->password))
            {
                Session::put('user', $user);
                Session::forget('admin');
                return redirect('/');
            }
            else
            {
                return back()->with('error_login', 'Invalid email or password');
            }
        }
        else
        {
            return back()->with('error_login', 'Invalid email or password');
        }
    }

    /**
     * @method logout()
     * @return view -> home page
     */
    public function logout()
    {
        if (Session::has('user'))
        {
            Session::forget('user');
            return redirect('/');
        }
        else
        {
            return redirect('/login');
        }
    }

    /**
     * @method notauth()
     * @return view -> notauth
     */
    public function notauth()
    {
        return view('User/notauth');
    }



}
