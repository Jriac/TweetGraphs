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

Route::get('/', 'WelcomeController@index');

Route::get('home', ['middleware' => 'auth','uses'=>'HomeController@index']);

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

Route::get('test','UserController@NewPassword');

Route::get('/recover','RecoverController@index');

Route::post('/form/sendEmail','UserController@SendRecoverPassword');
Route::post('/form/register', 'UserController@RegisterUser');
Route::post('/form/login', 'UserController@LogIn');


/*
 * Route::group(['middleware' => 'auth'], function() );
 */

