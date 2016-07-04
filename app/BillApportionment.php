<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Exceptions\InvalidApportionment;

class BillApportionment extends Model
{

	public function biller()
	{
		return $this->belongsTo(Biller::class);
	}

	public function scopeBill($query, $bill)
	{
		return $query->where('biller_id', $bill->biller->id);
	}

	public function scopeUser($query, $user)
	{
		return $query->where('user_id', $user->id);
	}

    protected function getMultiplierAttribute()
    {
    	return $this->percentage / 100;
    }

    public function amountDue($bill)
	{
		return $bill->amount * $this->multiplier;
	}

	public function validate()
	{
		$totalPercentageApportioned = ($this->biller->apportionments()->sum('percentage'));
		if ($totalPercentageApportioned != 100)
		{
			throw new InvalidApportionment("Total percentage apportioned is {$totalPercentageApportioned}");
		}
	}
}
