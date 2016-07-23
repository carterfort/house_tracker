<?php

namespace App\Billing;

/**
 * Add 'dirty_amount' to the $fillable attributes array for any model that implements this
 */

trait DirtyAmounts
{
	public function setDirtyAmountAttribute($amount)
	{
		var_dump($amount);
		$amount = str_replace('$', '', $amount);
		$filteredAmount = preg_replace('/[^\d\.]/', '', $amount);
		var_dump($filteredAmount);
		$this->attributes['amount'] = floatval($filteredAmount) * 100;
	}

	public function getFormattedAmountAttribute()
	{
		return "$".number_format( $this->attributes['amount'] / 100, 2, '.',',');
	}
}