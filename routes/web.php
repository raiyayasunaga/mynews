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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function() {
    Route::get('news/create', 'Admin\NewsController@add') -> middleware('auth');
    Route::post('news/create', 'Admin\NewsController@create')->middleware('auth');
    
    Route::get('news', 'Admin\NewsController@index')->middleware('auth');
    
    Route::post('profile/create', 'Admin\profileController@create');
    Route::get('profile/edit', 'Adimin\profileController@edit')->middleware('auth');
    Route::post('profile/edit', 'Adimin\profileController@update');
    Route::get('profile/create', 'Adimin\profileController@create')->middleware('auth');
    
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
     Route::get('news/create', 'Admin\NewsController@add');
     Route::post('news/create', 'Admin\NewsController@create'); # 追記
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
