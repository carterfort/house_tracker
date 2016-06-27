<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\User;
use App\Chore;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ChoresController extends Controller
{
    public function recordForUser(Chore $chore, User $user, $overrideDate = false)
    {
    	$chore->doneBy($user, $overrideDate);
    	return ['success' => true, 'chore' => $chore, 'user' => $user];
    }

    public function scores()
    {
    	return Chore::scores(7);
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'name' => 'required',
		]);

		$chore = new Chore();
		$chore->name = $request->name;
		$chore->summary = $request->summary;
		$chore->best_time_to_do = $request->best_time_to_do;
		$chore->repeats_every = $request->repeats_every;
		$chore->save();

		return home();
    }
}
