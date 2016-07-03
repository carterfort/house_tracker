<?php

namespace App\Billing;

use App\Bill;
use App\BillObligation;
use App\BillApportionment;

class ApportionsBills {
		
	protected $bill;
	protected $users;

	public function __construct(Bill $bill, $users)
	{
		$this->bill = $bill;
		$this->users = $users;
	}

	public function go()
	{		
		$this->users->each(function($user){
			$amount = $this->amountDueForUser($user);
			BillObligation::create([
				'user_id' => $user->id,
				'amount' => $amount,
				'bill_id' => $this->bill->id
			]);
		});
	}

	protected function amountDueForUser($user)
	{
		$apportionment = BillApportionment::bill($this->bill)->first();
		if ($apportionment)
		{
			//TODO - Figure out a way to evenly apportion? Or require explicit apportionment for each biller that has any apportionments...
		}
		
		return $this->amountForApportionment($apportionment);

		return $this->bill->amount / $this->users->count();

	}

	protected function amountForApportionment($apportionment)
	{

    	if ($apportionment->percentage){

			return $this->bill->amount * $apportionment->multiplier;
    	}

		return $apportionment->absolute;
    
	}

}