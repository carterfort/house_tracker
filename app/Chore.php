<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chore extends Model
{
    public function records()
    {
    	return $this->hasMany(ChoreRecord::class);
    }

}
