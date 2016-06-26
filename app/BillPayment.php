<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillPayment extends Model
{
    protected $dates = ['due_date', 'payment_made_at'];
    
    public function bill()
    {
    	return $this->belongsTo(Bill::class);
    }
}
