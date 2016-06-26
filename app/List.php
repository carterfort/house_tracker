<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class List extends Model
{
    public function categories()
    {
    	return $this->belongsToMany(ListCategory::class);
    }

    public function items()
    {
    	return $this->hasMany(ListItem::class);
    }
}
