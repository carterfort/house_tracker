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

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
Auth::routes();
Route::get('logout', 'Auth\LoginController@logout');

Route::group(['middleware' => 'auth'], function(){

	Route::get('chores/create', 'ChoresController@create');
	Route::get('billers/create', 'BillingController@createBiller');
	Route::get('billers/{biller}/bills/create', 'BillingController@createBillForBiller');
	Route::get('obligations/{obligation}/payments/create', 'BillingController@createPaymentForObligation');

});
