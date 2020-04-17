<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/about', function(){
    return view('about');
});

Route::get("/profile/{user}", 'ProfilesController@index');
Route::get("/profile/{user}/edit", 'ProfilesController@edit');
Route::patch("/profile/{user}", 'ProfilesController@update');


Route::get("/posts", 'PostsController@index');
Route::get("/posts/create", 'PostsController@create');
Route::post("/posts", 'PostsController@store');
Route::get("/posts-{user:slug}", 'PostsController@userIndex');
Route::get("/posts/{post}", 'PostsController@show');
Route::delete("/posts/{post}", 'PostsController@destroy');
