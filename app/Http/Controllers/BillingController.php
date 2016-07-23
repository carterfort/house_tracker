<?php

namespace App\Http\Controllers;

use App\Bill;
use App\Biller;
use App\Http\Requests;
use App\BillObligation;
use Illuminate\Http\Request;

class BillingController extends Controller
{
    public function createBiller()
    {
    	return view('billing/create-biller');
    }

    public function createBillForBiller(Biller $biller)
    {
    	return view('billing/create-bill', compact('biller'));
    }

    public function createPaymentForObligation(BillObligation $obligation)
    {
    	return view('billing/create-payment', compact('obligation'));
    }

}
