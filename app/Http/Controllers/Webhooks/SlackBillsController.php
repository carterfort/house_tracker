<?php

namespace App\Http\Controllers\Webhooks;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Controllers\Webhooks\Traits\ParseSlackText;

class SlackBillsController extends Controller {
	
	use ParseSlackText;	

	public function handle(Request $request)
	{
		$words = $this->parseSlackText($request);

		$biller = $this->findBillerForText($words[0]);
		$amount = $this->amountForText($words[1]);
		$displayAmount = displayCash($amount);

		$response = "Creating a new bill for {$biller->name} for {$displayAmount}";

		return response()->json(['text' => $response]);
	}

	protected function findBillerForText($text)
	{
		$biller = (object) [];

		switch ($text){
			case 'electric':
				$biller->name = 'Duquesne Light';
			break;
			case 'water':
				$biller->name = 'PGh2O';
			break;
		}

		return $biller;
	}

	protected function amountForText($text)
	{
		$amount = str_replace('$', '', $text);
		$filteredAmount = preg_replace('/[^\d\.]/', '', $text);
		return floatval($filteredAmount) * 100;
	}


}