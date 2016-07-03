<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillObligation extends Model
{
    protected $fillable = [
    	'user_id',
    	'amount',
    	'bill_id'
    ];
}
