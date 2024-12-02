<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/logout', 'App\Http\Controllers\admin\userController@logout')->name('logout');
Route::get('/login', 'App\Http\Controllers\admin\userController@login')->name('login');
Route::post('/login', 'App\Http\Controllers\admin\userController@doLogin')->name('doLogin');





//panel
Route::prefix('panel')->middleware('auth')->namespace('App\Http\Controllers\admin')->group(function () {
    Route::get('/', 'dashboardController@index')->name('dashboard.index');


    Route::prefix('users')->group(function () {
        Route::get('/', 'userController@list')->name('dashboard.user.list');
        Route::get('/add', 'userController@add')->name('dashboard.user.add');
        Route::get('/edit', 'userController@edit')->name('dashboard.user.edit');
        Route::get('/del', 'userController@del')->name('dashboard.user.del');
       Route::post('/save', 'userController@save')->name('dashboard.user.save');

    });
//    Route::prefix('post')->group(function () {
//        Route::get('/', 'postController@list')->name('dashboard.post.list');
//        Route::get('/add', 'postController@add')->name('dashboard.post.add');
//        Route::get('/edit/{id}', 'postController@edit')->name('dashboard.post.edit');
//        Route::get('/delete/{id}', 'postController@delete')->name('dashboard.post.del');
//        Route::post('/addSave/{id}', 'postController@addSave')->name('dashboard.post.addSave');
//    });
//    Route::prefix('contact')->group(function () {
//        Route::get('/', 'contactController@list')->name('dashboard.contact.list');
//        Route::get('/seen/{id}', 'contactController@seen')->name('dashboard.contact.seen');
//
//    });

});
