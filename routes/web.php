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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


//ログアウト中のページ

use App\Http\Middleware\MyMiddleware;

Route::group(['middleware' => 'guest'], function () {
  Route::get('/login', 'Auth\LoginController@login')-> name('login');
  Route::post('/login', 'Auth\LoginController@login');

  Route::get('/register', 'Auth\RegisterController@registerView');
  Route::post('/register', 'Auth\RegisterController@register');

  Route::get('/added', 'Auth\RegisterController@added');
  Route::post('/added', 'Auth\RegisterController@added');
});
//ログイン中のページ
//postに変更

Route::group(['middleware' => 'auth'], function () {
  Route::get('/top', 'PostsController@index');
  Route::post('/top', 'PostsController@postCreate');
  Route::post('/post/update', 'PostsController@postUpdate');
  Route::get('/post/{id}/delete', 'PostsController@postDelete');
  Route::get('/profile', 'UsersController@profile');


  Route::get('/search', 'UsersController@search');
  Route::post('/search', 'UsersController@searchView');

  Route::get('/follow-list','FollowsController@followList');
  Route::get('/follower-list', 'FollowsController@followerList');
  Route::get('/un-follow/{user_id}', 'FollowsController@unFollow')->name('un-follow');
  Route::get('/follow/{user_id}', 'FollowsController@follow')->name('follow');//bladeでrouteを使用するときはname

  Route::post('/post_create','PostsController@postCreate');
 });


 //ログアウト機能
Route::get('/logout', 'Auth\LoginController@logout');
