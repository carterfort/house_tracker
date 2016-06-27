<?php


/**
 * Record a chore for a user
 */
Route::get('chores/{chore}/add-record/{user}/{overrideDate?}', 'ChoresController@recordForUser');

/**
 * Get the chores scores for the last 7 days
 */
Route::get('chores/scores', 'ChoresController@scores');