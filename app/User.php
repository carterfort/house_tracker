<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function payments()
    {
        return $this->hasMany(BillPayment::class);
    }

    public function paidBill(Bill $bill)
    {
        return $this->payments()->whereHas('bill', function($query) use ($bill){ 
            $query->where('bills.id', $bill->id);
        })->count();
    }
}
