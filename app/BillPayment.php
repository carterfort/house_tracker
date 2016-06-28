<?php

namespace App;

use Carbon\Carbon;
use App\Billing\DirtyAmounts;
use Illuminate\Database\Eloquent\Model;

class BillPayment extends Model
{

	use DirtyAmounts;

    protected $dates = ['payment_made_on'];

    protected $fillable = ['bill_id', 'dirty_amount', 'payment_made_on'];

    public function scopeRecentForUser($query, $user)
    {
    	return $query->whereHas('madeBy', function($query) use ($user){
    		$query->where('users.id', $user->id);
    	})->where('created_at', '>', Carbon::now()->subWeeks(2));
    }

    public function bill()
    {
    	return $this->belongsTo(Bill::class);
    }

    public function madeBy()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }

    public function getAmountPaidAttribute()
    {
    	return $this->formattedAmount($this->amount);
    }

    protected function formattedAmount($amount)
	{
		return '$'.number_format($amount / 100, 2, '.', ',');
	}
}
