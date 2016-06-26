<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{

	public function payments()
	{
		return $this->hasMany(BillPayment::class);
	}
}
