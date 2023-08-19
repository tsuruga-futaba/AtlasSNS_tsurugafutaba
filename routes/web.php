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
  //トップページ
  Route::get('/top', 'PostsController@index');
  Route::post('/top', 'PostsController@postCreate');

  //投稿機能
  Route::post('/post/update', 'PostsController@postUpdate');
  Route::get('/post/{id}/delete', 'PostsController@postDelete');
  Route::post('/post_create','PostsController@postCreate');

  //プロフィール
  Route::get('/profile/{user_id}', 'UsersController@profile')->name('profile');

  //検索
  Route::get('/search', 'UsersController@search');
  Route::post('/search', 'UsersController@searchView');

  //フォローリスト
  Route::get('/follow-list','FollowsController@followList');
  //フォロワーリスト
  Route::get('/follower-list', 'FollowsController@followerList');

  //フォロー解除
  Route::get('/un-follow/{user_id}', 'FollowsController@unFollow')->name('un-follow');
  Route::get('/un-follow-pro/{user_id}', 'FollowsController@unFollowPro')->name('un-follow-pro');

  //フォロー
  Route::get('/follow/{user_id}', 'FollowsController@follow')->name('follow');//bladeでrouteを使用するときはname
  Route::get('/follow-pro/{user_id}', 'FollowsController@followPro')->name('follow-pro');//bladeでrouteを使用するときはname
 });


 //ログアウト機能
Route::get('/logout', 'Auth\LoginController@logout');
