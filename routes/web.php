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

Route::get('/', 'HomeController');


Route::get('posts' , 'PostsController@index');

Route::get('posts/create' , 'PostsController@create');

Route::post('posts/store' , 'PostsController@store');

Route::delete('posts/{post:slug}/delete' , 'PostsController@destroy' );

Route::get('posts/{post:slug}/edit' , 'PostsController@edit');

Route::patch('posts/{post:slug}/edit' , 'PostsController@update');

Route::get('categories/{category:slug}' , 'CategoryController@show');

Route::get('tags/{tag:slug}' , 'TagController@show');

Route::get('posts/{post:slug}' , 'PostsController@show');


Route::view('contact','contact');


Route::view('about', 'about');


Route::view('login', 'login');