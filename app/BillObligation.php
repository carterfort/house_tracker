<?php

namespace App;

use Carbon\Carbon;
use App\Billing\DirtyAmounts;
use Illuminate\Database\Eloquent\Model;

class BillObligation extends Model
{

	use DirtyAmounts;

    protected $fillable = [
    	'user_id',
    	'amount',
    	'bill_id'
    ];

    public function scopeUnpaid($query)
    {
    	return $query->has('payments', 0);
    }

    public function scopeUser($query, $user)
    {
    	return $query->whereUserId($user->id);
    }

    public function payments()
    {
    	return $this->hasMany(BillPayment::class, 'obligation_id');
    }

    public function bill()
    {
    	return $this->belongsTo(Bill::class);
    }

	public function makePayment($payment) {
		$this->payments()->save($payment);
	}

}
