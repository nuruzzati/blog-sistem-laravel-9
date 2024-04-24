<?php

use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Models\Category;
use App\Models\User;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', function () {
    return view('home', [
        "title" => "Home"
    ]);
});
Route::get('/about', function () {
    return view('about',  [
        "title" => "About",
        "nama" => "Nuruzzati",
        "kelas" => "11",
        "jurusan" => "Pengembangan Perangkat Lunak Dan Gim",
        "sekolah" => "Smk Negeri 4 Padalarang",
    ]);
});



Route::get('/posts', 'PostController@index');
Route::get('/posts/{post:slug}', 'PostController@show');


Route::get('/categories', function() {
    return view('categories', [
        'title' => 'Post Categories' ,
        'categories' => Category::all()
    ]);
    
});




Route::get('/login', 'LoginController@index')->name('login')->middleware('guest');
Route::post('/login', 'LoginController@authenticate');
Route::get('/register', 'RegisterController@index')->middleware('guest');
Route::post('/register', 'RegisterController@store');

Route::get('/dashboard', function() {
    return view('dashboard.index');
})->middleware('auth');


Route::post('/logout', 'LoginController@logout');


Route::get('/dashboard/posts/checkSlug', 'DashboardPostController@checkSlug')->middleware('auth');
Route::get('/dashboard/categories/checkSlug', 'AdminCategoryController@checkSlug')->middleware('auth');

Route::resource('/dashboard/posts', 'DashboardPostController')->middleware('auth');


Route::get('/dashboard/profil', 'ProfilController@index')->middleware('auth');
Route::get('/dashboard/profil/edit', 'ProfilController@edit')->middleware('auth');
Route::put('/dashboard/profil/update', 'ProfilController@update')->middleware('auth');



Route::resource('/dashboard/categories', 'AdminCategoryController')->except('show')->middleware('admin');
Route::resource('/dashboard/users', 'AdminUserController')->except('show')->middleware('admin');