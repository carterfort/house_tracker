<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class ListContainer extends Model
{

	public $table = 'lists';

    public function categories()
    {
    	return $this->belongsToMany(ListCategory::class);
    }

    public function items()
    {
    	return $this->hasMany(ListItem::class, 'list_id');
    }

    public function categorizeWith(ListCategory $category)
    {
    	$this->categories()->attach($category->id);
    }

    public function addItems(Collection $items)
    {
    	$items->each(function($item){
    		$this->items()->save($item);
    	});
    }
}
