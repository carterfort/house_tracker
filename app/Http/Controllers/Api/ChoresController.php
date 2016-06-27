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
    	return Chore::latestScores(7);
    }
}
