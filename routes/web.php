<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/
Route::get('/', 'App\Http\Controllers\User\UserController@home');
Route::get('/register', 'App\Http\Controllers\User\UserController@register');
Route::post('/handleRegister', 'App\Http\Controllers\User\UserController@handleRegister');

Route::get('/login', 'App\Http\Controllers\User\UserController@login');
Route::post('/handleLogin', 'App\Http\Controllers\User\UserController@handleLogin');

Route::get('/logout', 'App\Http\Controllers\User\UserController@logout');
Route::get('/notauth', 'App\Http\Controllers\User\UserController@notauth');

Route::get('/blog/{id}', 'App\Http\Controllers\User\BlogController@blog');
Route::post('/comment/{id}', 'App\Http\Controllers\User\BlogController@comment');
Route::get('/blog/{blog_id}/comment/edit/{comment_id}', 'App\Http\Controllers\User\BlogController@edit_comment');
Route::post('/blog/{blog_id}/comment/update/{comment_id}', 'App\Http\Controllers\User\BlogController@update_comment');
Route::get('/comment/delete/{id}', 'App\Http\Controllers\User\BlogController@delete_comment');

Route::get('/category/{id}', 'App\Http\Controllers\User\CategoryController@category');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::get('/admin/login', 'App\Http\Controllers\Admin\AdminController@login');
Route::post('/admin/handleLogin', 'App\Http\Controllers\Admin\AdminController@handleLogin');

Route::middleware('is_admin')->group(function () {
    Route::get('/dashboard', 'App\Http\Controllers\Admin\AdminController@dashboard');
    Route::get('/admin/logout', 'App\Http\Controllers\Admin\AdminController@logout');

    Route::get('/admin/add_cat', 'App\Http\Controllers\Admin\CategoryController@add_cat');
    Route::post('/admin/new_cat', 'App\Http\Controllers\Admin\CategoryController@newCategory');
    Route::get('/admin/cats', 'App\Http\Controllers\Admin\CategoryController@cats');

    Route::get('/admin/add_blog', 'App\Http\Controllers\Admin\BlogController@add_blog');
    Route::post('/admin/new_blog', 'App\Http\Controllers\Admin\BlogController@newBlog');
    Route::get('/admin/blogs', 'App\Http\Controllers\Admin\BlogController@blogs');

    Route::get('/admin/users', 'App\Http\Controllers\Admin\UsersController@users');
    Route::get('/admin/users/delete/{id}', 'App\Http\Controllers\Admin\UsersController@delete');
    Route::get('/admin/users/set_admin/{id}', 'App\Http\Controllers\Admin\UsersController@set_admin');
    Route::get('/admin/users/remove_admin/{id}', 'App\Http\Controllers\Admin\UsersController@remove_admin');

    Route::get('/admin/cats/edit/{id}', 'App\Http\Controllers\Admin\CategoryController@edit');
    Route::post('/admin/cats/update/{id}', 'App\Http\Controllers\Admin\CategoryController@update');
    Route::get('/admin/cats/delete/{id}', 'App\Http\Controllers\Admin\CategoryController@delete');

    Route::get('/admin/blogs/edit/{id}', 'App\Http\Controllers\Admin\BlogController@edit');
    Route::post('/admin/blogs/update/{id}', 'App\Http\Controllers\Admin\BlogController@update');
    Route::get('/admin/blogs/delete/{id}', 'App\Http\Controllers\Admin\BlogController@delete');
});

