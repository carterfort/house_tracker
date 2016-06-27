<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListCategory extends Model
{
    public function lists()
    {
    	return $this->belongsToMany(ListContainer::class, 'list_category_list', 'list_category_id', 'list_id');
    }

    /**
     * Add a list container object to this category
     */
    public function addList(ListContainer $list)
    {
    	$this->lists()->attach($list->id);
    }
}
