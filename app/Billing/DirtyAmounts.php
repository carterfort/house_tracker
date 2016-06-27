<?php

namespace App\Billing;

/**
 * Add 'dirty_amount' to the $fillable attributes array for any model that implements this
 */

trait DirtyAmounts
{
	public function setDirtyAmountAttribute($amount)
	{
		$amount = preg_replace('[^0-9^.]', '', $amount);
		$this->attributes['amount'] = $amount * 100;
	}
}