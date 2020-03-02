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
    return redirect(url('admin/home'));
});

Route::group(['prefix' => 'admin'], function() {
    Route::get('home', 'Admin\FoodController@home');
    Route::get('top', 'Admin\FoodController@top')->middleware('auth');
    Route::get('food/create', 'Admin\FoodController@add')->middleware('auth');
    Route::post('food/create', 'Admin\FoodController@create');
    Route::get('food/edit', 'Admin\FoodController@edit')->middleware('auth');
    Route::post('food/edit', 'Admin\FoodController@update')->middleware('auth');
    Route::get('food/delete', 'Admin\FoodController@delete')->middleware('auth');
    Route::get('food/index', 'Admin\FoodController@index')->middleware('auth');
    Route::get('food/today', 'Admin\FoodController@today')->middleware('auth');
    Route::get('food/history', 'Admin\FoodController@history')->middleware('auth'); //作業中
    Route::post('food/history', 'Admin\FoodController@check');
    
    Route::get('profile/create', 'Admin\ProfileController@add')->middleware('auth');
    Route::post('profile/create', 'Admin\ProfileController@create');
    Route::get('profile/edit', 'Admin\ProfileController@edit')->middleware('auth');
    Route::post('profile/edit', 'Admin\ProfileController@update');
    Route::get('profile/data', 'Admin\ProfileController@data')->middleware('auth');
});
Auth::routes();

Route::get('/home', function () {
    return redirect(url('admin/home'));
});