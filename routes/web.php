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

Route::get('posts' , 'PostsController@index')->name('posts.index');
Route::prefix('posts')->middleware('auth')->group(function () {

    Route::get('create' , 'PostsController@create')->name('posts.create');
    Route::post('store' , 'PostsController@store');
    Route::delete('{post:slug}/delete' , 'PostsController@destroy');
    Route::get('{post:slug}/edit' , 'PostsController@edit');
    Route::patch('{post:slug}/edit' , 'PostsController@update');

});
Route::get('posts/{post:slug}' , 'PostsController@show')->name('posts.show');

Route::get('categories/{category:slug}' , 'CategoryController@show')->name('categories.show');
Route::get('tags/{tag:slug}' , 'TagController@show')->name('tags.show');



Route::view('contact','contact');


Route::view('about', 'about');


Route::view('login', 'login');
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
