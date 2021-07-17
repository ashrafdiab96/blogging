<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    /**
     * @method users
     * @return view -> users
     */
    public function users()
    {
        $users = User::get();
        return view('Admin/users', compact('users'));
    }

    /**
     * @method set_admin
     * @return redirect -> to users
     */
    public function set_admin($id)
    {
        $user = User::where('id', $id)->first();
        if (! isset($user->id))
        {
            return 'notfound';
        }
        if ($user->is_admin === 0)
        {
            $user->is_admin = 1;
            $user->save();
            return redirect('/admin/users')->with('set_admin', 'This user becomes an admin successfully !');
        }
        else
        {
            return redirect('/admin/users')->with('already_admin', 'This user is already admin');
        }
    }

    /**
     * @method remove_admin
     * @return redirect -> to users
     */
    public function remove_admin($id)
    {
        $user = User::where('id', $id)->first();
        if (! isset($user->id))
        {
            return 'notfound';
        }
        if ($user->is_admin === 1)
        {
            $user->is_admin = 0;
            $user->save();
            return redirect('/admin/users')->with('remove_admin', 'This user removes as admin successfully !');
        }
        else
        {
            return redirect('/admin/users')->with('already_not_admin', 'This user is already not admin');
        }
    }

    /**
     * @method delete
     * @return redirect -> blogs
     */
    public function delete($id)
    {
        $user = User::where('id', $id)->first();
        if (! isset($user->id))
        {
            return 'notfound';
        }
        $user->delete();
        return redirect('/admin/users')->with('user_delete_success', 'User deleted successfully !');
    }


}
