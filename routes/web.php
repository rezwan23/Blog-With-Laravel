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



Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/adminbb', 'AdminController@index')->name('dashboard');
Route::namespace('Admin')->group(function(){
    Route::resource('/adminbb/categories', 'CategoryController');
    Route::resource('/adminbb/media', 'MediaController');
    Route::resource('/adminbb/post', 'PostController');
    Route::resource('/adminbb/menu', 'MenuController');
    Route::resource('/adminbb/page', 'PageController');
    Route::get('/adminbb/sitemeta', 'SiteMetaController@show')->name('sitemeta.show');
    Route::post('/adminbb/sitemeta', 'SiteMetaController@update')->name('sitemeta.update');
    Route::get('/adminbb/messages', 'MessageController@show')->name('messages');
    Route::post('/adminbb/messages', 'MessageController@destroy')->name('message.destroy');
});
Route::namespace('User')->group(function(){
    Route::get('posts/{post}', 'FrontEndController@show')->name('singlePost');
    Route::get('/category/{category}', 'FrontEndController@showCategoryPosts')->name('showCategoryPosts');
    Route::get('/', 'FrontEndController@index')->name('home');
    Route::post('/search', 'FrontEndController@search')->name('search');
    Route::get('/contact/showcontactForm', 'FrontEndController@showcontactform')->name('showContactForm');
    Route::post('/contact/showcontactForm', 'FrontEndController@postmessage')->name('postmessage');
    Route::get('/pages/{page}', 'FrontEndController@showpage')->name('showPage');
    Route::get('/error', 'FrontEndController@emptydata')->name('emptydata');
});
