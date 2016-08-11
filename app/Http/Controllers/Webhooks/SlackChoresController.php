<?php

namespace App\Http\Controllers\Webhooks;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Controllers\Webhooks\Traits\ParseSlackText;


class SlackChoresController extends Controller
{

	use ParseSlackText;

    public function handle(Request $request)
    {
    	$words = $this->parseSlackText($request);
    	//First word is the name of the person who did the chore
    	//Remaining words should make up the rest of the chore
    	//
    	$person = array_shift($words);
    	$chore = implode(' ', $words);

    	$response = "{$person} completed chore \"{$chore}\"";
    	return response()->json(['text' => $response]);
    }
}
