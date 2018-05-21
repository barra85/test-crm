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

Auth::routes();

Route::get('/', 'UserController@index')->name('users');

Route::get('login/{id}', function($p_iId) {
    Auth::loginUsingId($p_iId);
    return redirect('/my-profile');
});

Route::get('/my-profile', 'UserController@profile')->middleware('auth');
