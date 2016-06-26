<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChoreRecord extends Model
{

	public function doneBy()
	{
		return $this->belongsTo(User::class);
	}
    
    public function chore()
    {
    	return $this->belongsTo(Chore::class);
    }
}
