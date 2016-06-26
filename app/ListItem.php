<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListItem extends Model
{
    public function list()
    {
    	return $this->belongsTo(List::class);
    }
}
