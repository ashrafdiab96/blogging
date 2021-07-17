@extends('Admin.navbar')

@section('title', 'Categories')

@section('content')
    <div class="blogs w-100">
        <table class="table table-striped text-white m-auto text-center">
            @if (Session::has('cat_success'))
                <div class="alert alert-success">
                    {{ Session::get('cat_success') }}
                </div>
            @endif
            @if (Session::has('cat_update_success'))
                <div class="alert alert-success">
                    {{ Session::get('cat_update_success') }}
                </div>
            @endif
            @if (Session::has('cat_delete_success'))
                <div class="alert alert-danger">
                    {{ Session::get('cat_delete_success') }}
                </div>
            @endif
            <thead class="text-uppercase">
                <tr>
                    <th>Name</th>
                    <th>Category Description</th>
                    <th>Controls</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cats as $cat)
                    <tr>
                        <td>{{ $cat->cat_name }}</td>
                        <td>{{ $cat->cat_desc }}</td>
                        <td class="d-flex">
                            <a class="btn btn-warning mr-2 text-white" href="{{ url('/admin/cats/edit', $cat->id) }}">Edit</a>
                            <a class="btn btn-danger" href="{{ url('/admin/cats/delete', $cat->id) }}" onclick="return confirm('Are you sure you want to delete {{ $cat->cat_name }} ?')">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
