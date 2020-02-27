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
    return redirect(url('home'));
});

Route::group(['prefix' => 'admin'], function() {
    Route::get('food/top', 'Admin\FoodController@top');
    Route::get('food/create', 'Admin\FoodController@add')->middleware('auth');
    Route::post('food/create', 'Admin\FoodController@create');
    Route::get('food/edit', 'Admin\FoodController@edit')->middleware('auth');
    Route::post('food/edit', 'Admin\FoodController@update')->middleware('auth');
    Route::get('food/delete', 'Admin\FoodController@delete')->middleware('auth');
    Route::get('food/refresh', 'Admin\FoodController@refresh')->middleware('auth'); //追加 for todaypage
    Route::get('food', 'Admin\FoodController@index')->middleware('auth');
    Route::get('food/today', 'Admin\FoodController@today')->middleware('auth'); //作業中
    
    Route::get('profile/create', 'Admin\ProfileController@add')->middleware('auth');
    Route::post('profile/create', 'Admin\ProfileController@create');
    Route::get('profile/edit', 'Admin\ProfileController@edit')->middleware('auth');
    Route::post('profile/edit', 'Admin\ProfileController@update')->middleware('auth');
    Route::get('profile/data', 'Admin\ProfileController@data')->middleware('auth');
});
Auth::routes();

Route::get('/home', 'Admin\FoodController@top')->name('home');
