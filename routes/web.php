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

Route::get('/', 'MainController@index')->name('index');


Route::get('news', 'MainController@news');
Route::get('loadNews', 'MainController@loadNews')->name('load_news');


Route::get('contact', function () {
    return view('contact');
});


Route::get('about', function () {
    return view('about');
});


Route::get('portfolio', function () {
    return view('portfolio');
});


Route::get('portfolio-single', function () {
    return view('portfolio-single');
});


Route::get('shop', 'MainController@shop');
Route::get('wiki', 'MainController@wiki');
Route::get('wiki/{cat_name}', 'MainController@singleWiki');

Route::get('single-blog', function () {
    return view('single-blog');
});

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');


Route::group(['prefix'=>'pandook-admin','middleware'=>['adminAuth']], function(){
    Route::get('', 'Admin\MainController@index')->name('admin.index');
    Route::resource('wiki','Admin\WikiController', [
        'except' => [ 'show' ]
    ]);
    Route::resource('news','Admin\NewsController', [
        'except' => [ 'show' ]
    ]);
    Route::resource('products','Admin\ProductController', [
        'except' => [ 'show' ]
    ]);
    Route::resource('categories','Admin\CategoryController', [
        'except' => [ 'show','create' ]
    ]);

    Route::resource('orderType','Admin\OrderTypeController', [
        'except' => ['show']
    ]);

    Route::resource('order','Admin\OrderController', [
        'except' => ['show','store']
    ]);
    Route::post('productCat','Admin\OrderController@productCat')->name('productCat');
    Route::post('listCat','Admin\OrderController@listCat')->name('listCat');
    Route::post('submitOrder','Admin\OrderController@submitOrder')->name('submitOrder');


});

Route::get('/home', 'HomeController@index')->name('home');
