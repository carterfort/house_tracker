<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chore extends Model
{
    public function records()
    {
    	return $this->hasMany(ChoreRecord::class);
    }

    public function doneBy($user, $doneTime = false)
    {
    	$record = new ChoreRecord(['user_id' => $user->id]);
    	
    	$this->records()->save($record);

    	if ($doneTime){
    		$record->created_at = $doneTime;
    		$record->save();
    	}
    }
}
