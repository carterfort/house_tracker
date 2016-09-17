<?php


Route::post('slack/bills', 'SlackBillsController@handle');
Route::post('slack/chores', 'SlackChoresController@handle');