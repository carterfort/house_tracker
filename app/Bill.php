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
		'amount',
		'paid_in_full_on'
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
		return $this->hasManyThrough(BillPayment::class, BillObligation::class, 'bill_id', 'obligation_id');
	}

	public function obligations()
	{
		return $this->hasMany(BillObligation::class);
	}

	public function getAmountDueAttribute() {
		return $this->formattedAmount($this->amount - $this->payments()->sum('bill_payments.amount'));
	}

	protected function formattedAmount($amount) {
		return '$'.number_format($amount/100, 2, '.', ',');
	}

	public static function due() {
		return static ::dueAfter(Carbon::now())->unpaid()->get();
	}
}
