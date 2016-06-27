<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{

	protected $dates = ['due_date'];

	public function payments()
	{
		return $this->hasMany(BillPayment::class);
	}

	public function makePayment($payment)
	{
		$this->payments()->save($payment);
	}
}
