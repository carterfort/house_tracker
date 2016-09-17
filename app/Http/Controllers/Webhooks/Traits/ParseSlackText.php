<?php

namespace App\Http\Controllers\Webhooks\Traits;

trait ParseSlackText {

	public function parseSlackText($request)
	{
		$text = str_replace($request->trigger_word, '', $request->text);
		$text = trim($text);
		return explode(' ', $text);
	}
}