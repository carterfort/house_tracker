<?php

namespace App;

use Carbon\Carbon;

use App\Billing\DirtyAmounts;
use App\Billing\ApportionsBills;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model {

	use DirtyAmounts;

	protected $dates = ['due_date', 'paid_in_full_on'];

	protected $fillable = [
		'dirty_amount',
		'biller_id',
		'due_date',
		'amount'
	];

	public function apportion() {
		$apportioner = (new ApportionsBills($this, User::all()));
		$apportioner->go();
	}

	public function scopeDueAfter($query, $date) {
		return $query->where('due_date', '>', $date);
	}

	public function scopeUnpaid($query) {
		return $query->whereNull('paid_in_full_on');
	}

	public function biller() {
		return $this->belongsTo(Biller::class );
	}

	public function payments() {
		return $this->hasMany(BillPayment::class );
	}

	public function obligations()
	{
		return $this->hasMany(BillObligation::class);
	}


	public function makePayment($payment) {
		$this->payments()->save($payment);
		$this->updatePayments();
	}

	protected function updatePayments() {
		if ($this->amount <= $this->payments()->sum('amount')) {
			$this->attributes['paid_in_full_on'] = Carbon::now();
		} else {
			$this->attributes['paid_in_full_on'] = null;
		}
	}

	public function getAmountDueAttribute() {
		return $this->formattedAmount($this->amount-$this->payments()->sum('amount'));
	}

	protected function formattedAmount($amount) {
		return '$'.number_format($amount/100, 2, '.', ',');
	}

	public static function due() {
		return static ::dueAfter(Carbon::now())->unpaid()->get();
	}
}
