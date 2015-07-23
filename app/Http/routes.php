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

Route::get('/', function(){
	return view('registerJCN');
});

Route::get('/v1/user/activate','UserController@ValidateUser');
Route::get('/recover_pass',function(){
	return view('PasswordRecover');
});
Route::get('/v1/user/change_password','UserController@RecoverySolicited');
Route::get('prueba','ItemController@create');


Route::resource('item','ItemController');
Route::resource('trends','TrendsController');
Route::resource('trendyLista','TrendsViewController');
Route::resource('testsclass','TestclassController');


Route::post('/v1/user/register','UserController@RegisterUser');
Route::post('/v1/user/login','UserController@LogIn');
Route::post('/v1/user/send_recover_mail','UserController@SendRecoverPassword');
Route::post('/v1/user/mongo','MongoController@InsertTuit');





Route::group(['middleware' => 'auth'], function () {
	 Route::get('/v1/user/new_password', function () {
	 	return view('PassEdit');
    });
    Route::get('/v1/user/profile', function () {
    });

    Route::get('home','HomeController@index');

    Route::post('/v1/user/update_password','UserController@NewPassword');

Route::post('v1/user/tagsmodified','UserController@ModifyUserHashtags');
    Route::get('home/hash','UserController@GetUserHashtags');
});


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


