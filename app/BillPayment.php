<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillPayment extends Model
{
    protected $dates = ['payment_made_at'];

    protected $fillable = ['bill_id'];
    
    public function bill()
    {
    	return $this->belongsTo(Bill::class);
    }
}
