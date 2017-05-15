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

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['prefix' => 'admin', 'middleware' => ['auth','role:admin']], function () {
    Route::get('/', 'Admin\HomeController@index');
    Route::get('users', 'Admin\UserController@index');
    Route::get('users/create', 'Admin\UserController@create')->name('admin.user.create');
    
    Route::get('users/{user}', 'Admin\UserController@show')->name('admin.user.show');
    Route::get('users/{user}/edit', 'Admin\UserController@edit')->name('admin.user.edit');
    Route::put('users/{user}', 'Admin\UserController@update')->name('admin.user.update');
    Route::delete('users/{user}', 'Admin\UserController@destroy')->name('admin.user.delete');
});
