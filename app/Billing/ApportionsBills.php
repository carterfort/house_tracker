<?php

namespace App\Billing;

use App\Bill;

class ApportionsBills {

	protected $bill;

	public function __construct(Bill $bill) {
		$this->bill = $bill;
	}

	public function go() {

		//Fetch all users
		//Find any apportionment overrides for this bill provider
		//Create the obligations
	}

}