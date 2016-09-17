<?php

use Illuminate\Http\Request;

/**
 * Record a chore for a user
 */
Route::get('chores/{chore}/add-record/{user}/{overrideDate?}', 'ChoresController@recordForUser');

/**
 * Get the chores scores for the last 7 days
 */
Route::get('chores/scores', 'ChoresController@scores');

/**
 * Store Chores
 */
Route::post('chores', 'ChoresController@store');

/**
 * Store Billers
 */
Route::post('billers', 'BillingController@storeBiller');

/**
 * Store Bills
 */
Route::post('bills', 'BillingController@storeBill');

/**
 * Store Bill Payments
 */
Route::post('obligations/{obligation}/add-payment', 'BillingController@storePayment');

Route::post('bills/slack-webhook', function(Request $request){
	return response()->json(['text' => 'Say the words!']);
});