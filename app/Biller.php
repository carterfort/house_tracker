<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Biller extends Model
{
    protected $fillable = [
    	'name',
    	'summary',
    	'phone_number',
    	'website_url'
    ];

    public function scopeAutoCreatesOnDay($query, $day)
    {
    	return $query->where('auto_creates', true)
        ->where('auto_create_day', $day)
        ->has('billsForThisMonth', 0);
    }

    public function billsForThisMonth()
    {
    	return $this->billsForMonth();
    }

    public function billsForMonth($month = false)
    {
    	$monthArray = startEndOfMonth($month);
    	return $this->bills()->whereBetween('due_date', $monthArray);
    }

    public function createBillForThisMonth()
    {
    	Bill::create([
    		'amount' => $this->auto_create_amount,
    		'due_date' => Carbon::now()->endOfMonth(),
    		'biller_id' => $this->id
		]);
    }

    public function bills()
    {
    	return $this->hasMany(Bill::class);
    }
    
    public function apportionments()
    {
    	return $this->hasMany(BillApportionment::class);
    }
}
