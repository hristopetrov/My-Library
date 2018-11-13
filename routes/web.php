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


Route::get('/', 'HomeController@index')->name('homepage');

Route::group(['prefix' =>'user'],function(){
    Route::group(['middleware' => 'guest'], function (){
        Route::get('/signup', 'UserController@getSignup')->name('user.signup');
        Route::post('/signup', 'UserController@postSignup')->name('user.signup');
        Route::get('/signin', 'UserController@getSignin')->name('user.signin');
        Route::post('/signin', 'UserController@postSignin')->name('user.signin');
    });
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/profile', 'UserController@editProfile')->name('user.profile');
        Route::get('/logout', 'UserController@getLogout')->name('user.logout');
        Route::put('/profile/{id}', 'UserController@updateProfile')->name('user.edit');
    });
});

Route::get('/library','LibraryController@getLibrary')->name('library.library')->middleware('auth');
Route::get('/library/create','LibraryController@create')->name('library.create')->middleware('auth');
Route::post('/library/store','LibraryController@store')->name('library.store')->middleware('auth');
Route::get('/book/view/{id}','LibraryController@viewBook')->name('book.view');
Route::get('/book/edit/{id}','LibraryController@editBook')->name('book.edit')->middleware('auth');
Route::patch('/book/update/{id}','LibraryController@updateBook')->name('book.update')->middleware('auth');
Route::delete('/book/delete/{id}','LibraryController@destroy')->name('book.destroy')->middleware('auth');
Route::post('/book/add-to-library/{id}','LibraryController@addToLibrary')->name('book.add-to-library')->middleware('auth');






