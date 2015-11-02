<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('login',array('uses' => 'LoginController@showLogin'));
Route::post('login',array('uses' => 'LoginController@doLogin'));
Route::get('admin',array('uses' => 'LoginController@loggedIn'));
Route::get('logout',array('uses' => 'LoginController@logOut'));

