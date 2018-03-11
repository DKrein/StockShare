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

//Route::get('/', 'FrontendController@index');
//Route::get('/login', 'FrontendController@login')->name('login');
//Route::get('/register', 'FrontendController@register')->name('register');
//
//
//Route::group(['namespace' => 'Auth', 'as' => 'auth.'], function () {
//    Route::get('logout', 'LoginController@logout')->name('logout');
//    
//    Route::post('login_form', 'LoginController@login')->name('login_form');    
//    Route::post('register_form', 'RegisterController@register')->name('register_form'); 
//});
//
//Route::group(['middleware' => 'auth'], function () {
//    Route::get('/dashboard', 'BackendController@dashboard')->name('dashboard');
//  
//    Route::resource('/purchase', 'PurchaseController', ['except' => ['index','show','destroy']]);
//    Route::get('/purchase/{purchase}/delete', 'PurchaseController@delete')->name('purchase.destroy');
//});