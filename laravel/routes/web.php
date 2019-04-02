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


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

/*Comments*/
Route::post('/comment/','CommentController@send')->name('comment');
Route::get('/comments/{id}', 'CommentController@delete')->name('comments');

/*Events*/
Route::get('/post/getlike/{post_id}','EventController@getLike',['middleware' => 'auth',])->name('post.getlike');
Route::get('/post/removelike/{post_id}','EventController@removeLike',['middleware' => 'auth',])->name('post.removelike');
Route::get('/post/repost/{post_id}','EventController@repost',['middleware' => 'auth',]);



/*Posts*/
Route::get('/post/{slug}', 'PostController@post',['middleware' => 'auth']);
Route::get('/posts/tag/{tag_id}','PostController@tag',['middleware' => 'auth'])->name('post.tag');
Route::get('/post/delete/{id}','PostController@delete')->name('post.delete');
Route::get('/posts/{slug}','PostController@index')->name('post.index');
Route::get('/posts/','PostController@home_index')->name('post.home_index');
Route::get('/', 'HomeController@index')->name('home');

/*Users*/
Route::get('/users/','UserController@index')->name('users');
Route::get('/users/subscribe/{id}','UserController@subscribe');
Route::get('/users/unsubscribe/{id}','UserController@unsubscribe');
Route::get('/subscriptions/','UserController@subscriptions')->name('subscriptions');

