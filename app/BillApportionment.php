<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillApportionment extends Model
{

	public function scopeBill($query, $bill)
	{
		return $query->where('biller_id', $bill->biller->id);
	}

    public function getMultiplierAttribute()
    {
    	return $this->percentage / 100;
    }
}
