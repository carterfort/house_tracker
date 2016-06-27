<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Biller extends Model
{
    protected $fillable = [
    	'name',
    	'summary',
    	'phone_number',
    	'website_url'
    ];
    
}
