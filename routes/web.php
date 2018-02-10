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

 // Route::get('/', function(){
 //    return view('welcome');
 // });

// Blog posts Route
Route::get('/exp', function(){
    return view('home');
});
Route::get('/contact', 'Emailcontroller@index');
Route::get('/about','vlogController@about')->name('blog.about');
Route::post('/contact', 'Emailcontroller@send')->name('blog.contact');
Route::get('/blog', 'vlogController@blogs')->name('blog.home');
Route::get('/single/{id}', 'vlogController@single')->name('blog.single');
Route::get('/tagpost/{id}', 'vlogController@tagpost')->name('blog.tagpost');
Route::get('/comment/{id}', 'commentController@index');
Route::post('/comment/{post}', 'commentController@addComment');
Route::post('/reply/{comment}','commentController@addreply')->name('single.reply');
Route::put('comment/edit/{id}', 'commentController@editcomment')->name('comment.edit');
Route::put('reply/edit/{id}', 'commentController@editReply')->name('reply.edit');
Route::delete('comment/delete/{id}', 'commentController@destroy')->name('comment.delete');
Route::delete('reply/delete/{id}', 'commentController@destroyReply')->name('reply.delete');

Route::get('/search', 'vlogController@search');
Route::get('search/autocomplete', 'vlogController@autocomplete');
Route::get('/searchs', 'vlogController@vsearch');

Auth::routes();
Route::post('/logout','Auth\LoginController@userlogout')->name('user.logout');

Route::get('/home', 'HomeController@index');
Route::get('/', 'vlogController@index');

//Api Routes
Route::get('/api','ApiController@index');
Route::get('/serchapi','ApiController@serchapi');
Route::get('/edman','ApiController@recipe')->name('user.recipe');

Route::get('/apitoken', function(){
    return view('web.createApiToken');
});



// Admin Routes
Route::group(['prefix' => 'admin'], function () {

    Route::get('/post','newController@index');
    Route::post('/post','newController@store');
    Route::get('/post/create','newController@create');
    Route::get('/post/{id}/edit','newController@edit');
    Route::put('/post/{id}','newController@update');
    Route::delete('/post/{id}','newController@destroy');
    Route::get('/post/{id}','newController@show');
    Route::get('/blog/{slug}','supportController@showslug')->where('slug','[@\w\d\-\_]+')->name('blog.slug');
    Route::resource('/catagory','catagoryController');
    Route::resource('/tag','TagController',['except' => 'create']);

    Route::get('/home','AdminController@index')->name('admin.dashboard');
    Route::get('/login','Auth\AdminLoginController@showAdminLogin')->name('admin.login');
    Route::post('/login','Auth\AdminLoginController@adminLogin')->name('admin.login.submit');
    Route::post('/logout','Auth\AdminLoginController@adminlogout')->name('admin.logout');

    
    Route::GET('/password/reset','Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::POST('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::POST('/password/reset','Auth\AdminResetPasswordController@reset');
    Route::GET('/password/reset/{token}','Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset') ;

    Route::GET('/search', 'searchController@search')->name('admin.search');
    Route::GET('/search/autocomplete', 'searchController@autocomplete');

    Route::get('/', function () {
       return view('admin.index');


   });
});



// Route::resource('post','postController');





