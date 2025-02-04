<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/paymentCallBack', 'App\Http\Controllers\front\paymentController@callback')->name('payment.callback');

Route::middleware(\App\Http\Middleware\configFront::class)->namespace('App\Http\Controllers\front')->group(function () {


    Route::middleware('auth')->group(function () {
        Route::post('/addPhone', 'homePageController@addPhone')->name('addPhone');
        Route::get('/profile', 'userController@profile')->name('profile');
        Route::get('/profile', 'userController@profile')->name('profile');
        Route::post('/profile', 'userController@profileSave')->name('profileSave');
        Route::get('/paymentResult/{id}', 'App\Http\Controllers\front\paymentController@showResult')->name('payment.result');
        Route::prefix('shop')->group(function () {

            Route::get('/myOrders/{status?}', 'orderController@userOrders')->name('shop.userOrders');
            Route::get('/myOrder/{id}', 'orderController@userOrder')->name('shop.userOrder');
            Route::prefix('order')->group(function () {

                Route::get('/checkOut/{id}', 'orderController@checkOut')->name('shop.order.checkOut');
                Route::post('/checkOut/{orderId}', 'orderController@completeOrder')->name('shop.order.completeOrder');
                Route::get('/payment/{orderId}', 'orderController@payment')->name('shop.order.payment');
                Route::get('/receipt/{id}', 'orderController@receipt')->name('shop..order.receipt');

            });
        });
    });

    Route::get('/', 'homePageController@index')->name('index');
    Route::post('/comment', 'homePageController@sendComment')->name('sendComment');
    Route::get('/search', 'homePageController@search')->name('search');


    Route::prefix('shop')->group(function () {

        Route::get('/', 'shopController@index')->name('shop.index');
        Route::get('/category/{catId}', 'shopController@indexCatedory')->name('shop.index.category');
        Route::get('/{id}', 'shopController@product')->name('shop.product');
        Route::prefix('order')->group(function () {
            Route::post('/addCard/{product_Id}/{orderId}', 'orderController@addToChard')->name('shop.order.addCard');
            Route::get('/removeCard/{product_Id}/{orderId}', 'orderController@removeCard')->name('shop.order.removeCard');


        });
    });
    //faq
    Route::prefix('faq')->group(function () {
        Route::get('/', 'faqController@index')->name('faq.index');
    });

    //blogs
    Route::prefix('blog')->group(function () {

        Route::get('/', 'blogController@index')->name('blog.index');
        Route::get('/{id}', 'blogController@showPost')->name('blog.showPost');
        Route::get('/category/{id}', 'blogController@categoryPostList')->name('blog.categoryPostList');


    });

});


Route::get('/logout', 'App\Http\Controllers\admin\userController@logout')->name('logout');
Route::get('/login', 'App\Http\Controllers\admin\userController@login')->name('login');
Route::post('/login', 'App\Http\Controllers\admin\userController@doLogin')->name('doLogin');
// Route to redirect to Google's OAuth page
Route::get('/auth/google/redirect', 'App\Http\Controllers\front\userController@redirect')->name('auth.google.redirect');
Route::get('/auth/google/callback', 'App\Http\Controllers\front\userController@callback')->name('auth.google.callback');
//
//// Route to handle the callback from Google
//Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback'])->name('auth.google.callback');

//panel
Route::prefix('panel')->middleware(['auth', \App\Http\Middleware\getConfigForAll::class, \App\Http\Middleware\adminOnly::class])->namespace('App\Http\Controllers\admin')->group(function () {
    Route::get('/', 'dashboardController@index')->name('dashboard.index');


    Route::prefix('users')->group(function () {
        Route::get('/', 'userController@list')->name('dashboard.user.list');
        Route::get('/Profile', 'userController@Profile')->name('dashboard.user.Profile');
        Route::post('/Profile', 'userController@saveProfile')->name('dashboard.user.saveProfile');
        Route::get('/add', 'userController@add')->name('dashboard.user.add');
        Route::get('/edit/{id}', 'userController@edit')->name('dashboard.user.edit');
        Route::get('/del/{id}', 'userController@del')->name('dashboard.user.del');
        Route::post('/save/{id}', 'userController@save')->name('dashboard.user.save');
    });
    Route::prefix('config')->group(function () {
        Route::get('/', 'configController@showConfig')->name('dashboard.config');
        Route::post('/', 'configController@saveConfig')->name('dashboard.saveConfig');
        Route::post('/saveService', 'configController@saveservice')->name('dashboard.saveService');
    });
    Route::prefix('faq')->group(function () {
        Route::get('/', 'faqController@index')->name('dashboard.faq');
        Route::get('/add', 'faqController@add')->name('dashboard.faq.add');
        Route::get('/edit/{id}', 'faqController@edit')->name('dashboard.faq.edit');
        Route::get('/del/{id}', 'faqController@del')->name('dashboard.faq.del');
        Route::post('/save/{id}', 'faqController@save')->name('dashboard.faq.save');
//        Route::post('/', 'configController@saveConfig')->name('dashboard.saveConfig');
//        Route::post('/saveService', 'configController@saveservice')->name('dashboard.saveService');
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
            Route::get('/edit/{id}', 'orderController@edit')->name('dashboard.shop.order.edit');
            Route::get('/show/{id}', 'orderController@show')->name('dashboard.shop.order.show');
//            Route::get('/del/{id}', 'orderController@del')->name('dashboard.shop.order.del');
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
    Route::prefix('phoneBook')->group(function () {
        Route::get('/', 'phoneBookController@index')->name('dashboard.phoneBook.list');
    });

    Route::prefix('blog')->group(function () {
        Route::prefix('category')->group(function () {
            Route::get('/', 'blogController@catIndex')->name('dashboard.blog.category.list');
            Route::get('/add', 'blogController@catAdd')->name('dashboard.blog.category.add');
            Route::get('/edit/{id}', 'blogController@catEdit')->name('dashboard.blog.category.edit');
            Route::post('/save/{id}', 'blogController@catSave')->name('dashboard.blog.category.save');
            Route::get('/del/{id}', 'blogController@catDelete')->name('dashboard.blog.category.delete');
        });
        Route::get('/', 'blogController@index')->name('dashboard.blog.list');
        Route::get('/add', 'blogController@add')->name('dashboard.blog.add');
        Route::get('/edit/{id}', 'blogController@edit')->name('dashboard.blog.edit');
        Route::post('/save/{id}', 'blogController@save')->name('dashboard.blog.save');
        Route::get('/del/{id}', 'blogController@delete')->name('dashboard.blog.delete');
    });
});
