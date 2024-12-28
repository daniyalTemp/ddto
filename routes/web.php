<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::middleware(\App\Http\Middleware\configFront::class)->namespace('App\Http\Controllers\front')->group(function () {
    Route::get('/', 'homePageController@index')->name('index');
    Route::prefix('shop')->group(function () {
        Route::get('/', 'shopController@index')->name('shop.index');
        Route::get('/{id}', 'shopController@product')->name('shop.product');
        Route::prefix('order')->group(function () {
            Route::post('/addCard/{product_Id}/{orderId}', 'orderController@addToChard')->name('shop.order.addCard');
//            Route::get('/{id}', 'shopController@product')->name('shop.product');

        });
    });

});


Route::get('/logout', 'App\Http\Controllers\admin\userController@logout')->name('logout');
Route::get('/login', 'App\Http\Controllers\admin\userController@login')->name('login');
Route::post('/login', 'App\Http\Controllers\admin\userController@doLogin')->name('doLogin');


//panel
Route::prefix('panel')->middleware(['auth',\App\Http\Middleware\getConfigForAll::class])->namespace('App\Http\Controllers\admin')->group(function () {
    Route::get('/', 'dashboardController@index')->name('dashboard.index');


    Route::prefix('users')->group(function () {
        Route::get('/', 'userController@list')->name('dashboard.user.list');
        Route::get('/Profile', 'userController@Profile')->name('dashboard.user.Profile');
        Route::post('/Profile', 'userController@saveProfile')->name('dashboard.user.saveProfile');
        Route::get('/add', 'userController@add')->name('dashboard.user.add');
        Route::get('/edit/{id}', 'userController@edit')->name('dashboard.user.edit');
        Route::get('/del', 'userController@del')->name('dashboard.user.del');
        Route::post('/save/{id}', 'userController@save')->name('dashboard.user.save');

    });
    Route::prefix('config')->group(function () {
        Route::get('/', 'configController@showConfig')->name('dashboard.config');
        Route::post('/', 'configController@saveConfig')->name('dashboard.saveConfig');
        Route::post('/saveService', 'configController@saveservice')->name('dashboard.saveService');
    });
    //shop
    Route::prefix('shop')->group(function () {
        //payments
        Route::prefix('payment')->group(function () {
            Route::get('/', 'paymentController@index')->name('dashboard.shop.payment.list');
//            Route::get('/add', 'paymentController@create')->name('dashboard.shop.payment.add');

        });
        Route::prefix('order')->group(function () {
            Route::get('/', 'orderController@index')->name('dashboard.shop.order.list');
            Route::get('/add', 'orderController@create')->name('dashboard.shop.order.add');
            Route::post('/save/{id}', 'orderController@store')->name('dashboard.shop.order.save');
            Route::get('/edit/{id}', 'orderController@iedit')->name('dashboard.shop.order.edit');
//            Route::get('/add', 'paymentController@create')->name('dashboard.shop.payment.add');

        });
        //category
        Route::prefix('category')->group(function () {
            Route::get('/', 'shopController@categoryList')->name('dashboard.shop.category.list');
            Route::get('/add', 'shopController@categoryAdd')->name('dashboard.shop.category.add');
            Route::get('/edite/{id}', 'shopController@categoryEdit')->name('dashboard.shop.category.edit');
            Route::post('/save/{id}', 'shopController@categorySave')->name('dashboard.shop.category.save');
            Route::get('/del{id}', 'shopController@categoryDel')->name('dashboard.shop.category.del');
        });


        Route::get('/', 'shopController@productLsit')->name('dashboard.shop.product.list');
        Route::get('/add', 'shopController@productAdd')->name('dashboard.shop.product.add');
        Route::get('/edite/{id}', 'shopController@productEdit')->name('dashboard.shop.product.edit');
        Route::post('/save/{id}', 'shopController@productSave')->name('dashboard.shop.product.save');
        Route::post('/saveExtra/{id}/{type?}/{Eid?}', 'shopController@productSaveExtra')->name('dashboard.shop.product.saveExtra');
        Route::get('/del/{id}', 'shopController@productDel')->name('dashboard.shop.product.del');
        Route::get('/delExtra/{type}/{pid}/{id}', 'shopController@productDelExtra')->name('dashboard.shop.product.delExtra');

    });


    Route::prefix('comments')->group(function () {
        Route::get('/', 'commentController@list')->name('dashboard.comments.list');
        Route::get('/show/{id}', 'commentController@show')->name('dashboard.comments.show');
        Route::get('/del/{id}', 'commentController@del')->name('dashboard.comments.del');
        Route::get('/seen/{id}/{status}', 'commentController@seen')->name('dashboard.comments.seen');
        Route::get('/showInWeb/{id}/{status}', 'commentController@showInWeb')->name('dashboard.comments.showInWeb');
        Route::post('/addNote/{id}', 'commentController@addNote')->name('dashboard.comments.addNote');

    });
});
