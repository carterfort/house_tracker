<?php

use Carbon\Carbon;

function home()
{
	return redirect()->route('home');
}

function startEndOfMonth($month){
	
	if ( ! $month) $month = Carbon::now();

	if ( ! is_object($month)) $month = Carbon::parse($month);

	$start = $month->copy()->startOfMonth();
	$end = $start->copy()->endOfMonth();

	return [$start, $end];
}

function displayCash($cents)
{
	return "$".number_format($cents / 100, 2, '.',',');
}