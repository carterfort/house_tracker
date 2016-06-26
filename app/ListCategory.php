<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListCategory extends Model
{
    public function lists()
    {
    	return $this->belongsToMany(List::class);
    }
}
