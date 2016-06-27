<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListItem extends Model
{

	protected $dates = ['completed_at'];

	public function completedBy()
	{
		return $this->belongsTo(User::class, 'completed_by_id');
	}

    public function list()
    {
    	return $this->belongsTo(ListContainer::class, 'list_id');
    }

    public function complete()
    {
    	$this->completed_at = date('Y-m-d');
    	$this->completed_by_id = auth()->user()->id;
    	$this->save();
    }

    public function incomplete()
    {
    	$this->completed_at = null;
    	$this->completed_by_id = null;
    	$this->save();
    }
}
