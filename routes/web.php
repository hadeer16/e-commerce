<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', function () {
    return view('auth.login');
});
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ 
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
        //Route::get('/front', 'FrontController@index')->name('front');
        Route::group(['namespace'=>'catogry'], function() {
            Route::get('catogry', 'CatogryController@index')->name('catogry');
             Route::post('setcatogry', 'CatogryController@store')->name('setcatogry');
             Route::get('/getcatogry', 'CatogryController@getcatogry')->name('getcatogry');
             Route::delete('/del_cate{id}', 'CatogryController@destroy')->name('del_cate');
             Route::get('change/{id}', 'CatogryController@ChangeStutas');
             Route::get('changed/{id}', 'CatogryController@ChangedStutas');
         });
        Route::group(['namespace'=>'product'], function() {
            Route::resource('product', 'ProductController');
            Route::get('changes/{id}', 'ProductController@changestutas'); 
        });
        Route::group(['namespace'=>'order'], function() {
            Route::resource('order', 'OrderController');
            Route::get('orders/{id}', 'OrderController@changestat'); 
        });
        // Route::group(['namespace'=>'front'], function() {
        //     Route::resource('front', 'FrontController'); 
        // });
    });
    Route::get('/home','HomeController@index')->name('home');
    Route::group(['namespace'=>'cart'], function() {
        Route::resource('cart', 'CartController');
    });
    Route::group(['namespace'=>'detail'], function() {
        Route::resource('detail', 'DetailController');
    });
    Route::group(['namespace'=>'shop'], function() {
        Route::resource('shop', 'ShopController');
    });
    Route::group(['namespace'=>'checkout'], function() {
        Route::resource('checkout', 'CheckoutController');
    });