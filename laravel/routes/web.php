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
Route::post('/comment/','CommentController@send')/*->name('comment')*/;
Route::get('/comments/{id}', 'CommentController@delete')->name('comments');
Route::post('/comment/add','CommentController@send');
/*Events*/
Route::get('/post/getlike/{post_id}','EventController@getLike',['middleware' => 'auth',])->name('post.getlike');
Route::get('/post/removelike/{post_id}','EventController@removeLike',['middleware' => 'auth',])->name('post.removelike');
Route::get('/post/repost/{post_id}','EventController@repost',['middleware' => 'auth',]);
Route::get('/post/unrepost/{post_id}','EventController@unrepost',['middleware' => 'auth',])->name('unrepost');
Route::get('/categories/child/{id}','EventController@child');




/*Posts*/
Route::get('/post/{slug}', 'PostController@post',['middleware' => 'auth']);
Route::get('/posts/tag/{tag_id}','PostController@tag',['middleware' => 'auth'])->name('post.tag');
Route::get('/post/delete/{id}','PostController@delete')->name('post.delete');
Route::get('/posts/{slug}','PostController@index')->name('post.index');
Route::get('/posts/','PostController@home_index')->name('post.home_index');
Route::get('/', 'HomeController@index')->name('home');
Route::post('/post/create','PostController@store')->name('post.create');
Route::get('/search/','PostController@search')->name('search');

/*Users*/
Route::get('/users/','UserController@index')->name('users');
Route::get('/users/subscribe/{id}','UserController@subscribe');
Route::get('/users/unsubscribe/{id}','UserController@unsubscribe');
Route::get('/subscriptions/','UserController@subscriptions')->name('subscriptions');
Route::get('/subscriptions/{id}','UserController@subscriptionsUser')->name('subscriptions.user');
Route::get('/user/{id}','UserController@thisUser')->name('user');
Route::get('/notifications','UserController@notifications')->name('notifications');
Route::get('/refresh/{id}','EventController@refreshNotif');
Route::get('/check/{id}','UserController@checkUser');

/*Account*/
Route::get('/account/{id}','AccountController@userAccount')->name('account');
Route::get('/account/','AccountController@myAccount')->name('myAccount');
Route::get('/account/about/{id}','AccountController@about')->name('about');
Route::get('/account/profile/edit/','AccountController@edit')->name('edit.profile');
Route::post('/account/profile/update','AccountController@update')->name('update.profile');
Route::get('/account/edit/work/{id}','AccountController@editWork')->name('edit.work');
Route::get('/account/create/work','AccountController@createWork')->name('create.work');
Route::post('/account/update/work','AccountController@updateWork')->name('update.work');
Route::get('/account/password/change','AccountController@password')->name('password');
Route::post('/account/password/change/save','AccountController@passwordSave')->name('password.save');

/*Media*/
Route::get('/gallery/{id}','AccountController@photos')->name('gallery');
Route::get('/video/{id}','AccountController@videos')->name('videos');
Route::post('/photo/add','AccountController@photo_store')->name('create.photo');
Route::post('/video/add','AccountController@video_store')->name('create.video');
Route::get('/photos','AccountController@allPhotos')->name('all.photos');
Route::get('/vines','AccountController@allVideos')->name('all.videos');
Route::get('/video/delete/{id}','AccountController@deleteVideo')->name('video.delete');
Route::get('/photo/delete/{id}','AccountController@deletePhoto')->name('image.delete');


/*Chat*/
Route::get('/contacts', 'ContactsController@get');
Route::get('/conversation/{id}', 'ContactsController@getMessagesFor');
Route::post('/conversation/send', 'ContactsController@send');
Route::get('/messenger','UserController@chat')->name('messenger');
