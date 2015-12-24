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

Route::get('hospitaladmin',array('uses' => 'HosAdminLoginController@showLogin'));
Route::post('hospitaladmin',array('uses' => 'HosAdminLoginController@doLogin'));

//For Root
Route::get('maradmin',array('uses' => 'RootController@loggedIn'));
Route::get('adduser',array('uses' => 'RootController@addUser'));
Route::post('adduser',array('uses' => 'RootController@addToDb'));
Route::get('viewuser',array('uses' => 'RootController@viewUser'));
Route::get('addhosadmin',array('uses' => 'RootController@addHosAdmin'));
Route::post('addhosadmin',array('uses' => 'RootController@addHosAdminToDb'));
Route::get('viewhosadmin',array('uses' => 'RootController@viewHosAdmin'));

//For Marketing Admin
Route::get('admin',array('uses' => 'LoginController@loggedIn'));
Route::get('logout',array('uses' => 'LoginController@logOut'));
Route::get('addhospital',array('uses' => 'HospitalController@addHospital'));
Route::post('addhospital',array('uses' => 'HospitalController@addToDb'));
Route::get('updatedetails',array('uses' => 'HospitalController@getDetails'));
Route::post('updatedetails',array('uses' => 'HospitalController@postDetails'));
Route::get('edithospital',array('uses' => 'HospitalController@geteditedDetails'));
Route::post('edithospital',array('uses' => 'HospitalController@posttodb'));
Route::get('adddoctor',array('uses' => 'DoctorController@addDoctor'));
Route::post('adddoctor',array('uses' => 'DoctorController@addToDb'));
Route::get('updatedoctor',array('uses' => 'DoctorController@getDetails'));
Route::post('updatedoctor',array('uses' => 'DoctorController@postDetails'));
Route::get('editdoctor',array('uses' => 'DoctorController@geteditedDetails'));
Route::post('editdoctor',array('uses' => 'DoctorController@posttodb'));
Route::get('viewhospital',array('uses' => 'HospitalController@viewHospital'));
Route::get('viewdoctors',array('uses' => 'DoctorController@viewDoctor'));

//Hospital Admin
Route::get('hosadmin',array('uses' => 'HospitalAdminController@loggedIn'));


//Front Pages Routes

Route::get('/', 'FrontController@home');
Route::get('about','FrontController@about');
Route::get('doctors','FrontController@list_doctor');
Route::get('specialty','FrontController@list_specialty');
Route::get('hospitals', 'FrontController@list_hospital');	
Route::get('hospital/item/{id}', 'FrontController@item_view');
Route::get('doctors/item/{id}', 'FrontController@doctor_view');












