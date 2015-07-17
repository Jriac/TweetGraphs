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

//Route::get('home', ['middleware' => 'auth','uses'=>'HomeController@index']);

Route::get('prueba','UserController@prueba');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('/register','RegisterController@index');

Route::get('activate','UserController@ValidateUser');

Route::resource('item','ItemController');
Route::resource('trends','TrendsController');
Route::resource('trendyLista','TrendsViewController');
Route::resource('testsclass','TestclassController');

Route::get('test','UserController@RegisterUser');

Route::get('/recover','RecoverController@index');


Route::post('/v1/user/register','UserController@RegisterUser');
Route::post('/v1/user/login','UserController@LogIn');
Route::get('/v1/user/recover_pass',function(){
	return view('PasswordRecover');
});



Route::group(['middleware' => 'auth'], function () {
    Route::get('/v1/user/change_password',function(){
	return view('change_password');
	});

    Route::get('/v1/user/profile', function () {
    });

    Route::get('/home','HomeController@index');
});




/*
 * Route::group(['middleware' => 'auth'], function() );
 */

