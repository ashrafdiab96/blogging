@extends('Admin.navbar')

@section('title', 'Users')

@section('content')
    <div class="blogs w-100">
        <table class="table table-striped text-white m-auto text-center">
            @if (Session::has('already_admin'))
                <div class="alert alert-danger">
                    {{ Session::get('already_admin') }}
                </div>
            @endif
            @if (Session::has('set_admin'))
                <div class="alert alert-success">
                    {{ Session::get('set_admin') }}
                </div>
            @endif

            @if (Session::has('already_not_admin'))
                <div class="alert alert-danger">
                    {{ Session::get('already_not_admin') }}
                </div>
            @endif
            @if (Session::has('remove_admin'))
                <div class="alert alert-success">
                    {{ Session::get('remove_admin') }}
                </div>
            @endif
            @if (Session::has('user_delete_success'))
                <div class="alert alert-danger">
                    {{ Session::get('user_delete_success') }}
                </div>
            @endif
            <thead class="text-uppercase">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Admin</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->fname }} {{ $user->lname ? $user->lname : null }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if ($user->is_admin === 0)
                                <a class="btn btn-success mr-2 text-white w-100" href="{{ url('/admin/users/set_admin', $user->id) }}" onclick="return confirm('Are you sure you want to set {{ $user->fname }} as admin ?')">Set Admin</a>
                            @else
                                <a class="btn btn-warning mr-2 text-white w-100" href="{{ url('/admin/users/remove_admin', $user->id) }}" onclick="return confirm('Are you sure you want to remove {{ $user->fname }} as admin ?')">Remove Admin</a>
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-danger" href="{{ url('/admin/users/delete', $user->id) }}" onclick="return confirm('Are you sure you want to delete {{ $user->fname }} ?')">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
