@extends("Admin.navbar")
@section('title', 'Dashboard')

@section('content')
    <div class="dashboard h-100 w-100 d-flex flex-column align-items-center">
        <div class="card usersCard text-white mt-5 text-center">
          <div class="card-body">
            <h4 class="card-title">{{ $users->count() }}</h4>
            <p class="card-text">Users</p>
          </div>
        </div>

        <div class="itemsCards w-100 d-flex flex-row align-items-center justify-content-center">
            <div class="card blogsCard text-white m-5 text-center">
                <div class="card-body">
                  <h4 class="card-title">{{ $blogs->count() }}</h4>
                  <p class="card-text">Blogs</p>
                </div>
              </div>

              <div class="card catsCard text-white m-5 text-center">
                <div class="card-body">
                  <h4 class="card-title">{{ $cats->count() }}</h4>
                  <p class="card-text">Categories</p>
                </div>
              </div>
        </div>
    </div>
@endsection
