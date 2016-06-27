<?php

namespace App\Http\Controllers;

use App\Bill;
use App\Biller;
use App\Http\Requests;
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

    public function createPaymentForBill(Bill $bill)
    {
    	return view('billing/create-payment', compact('bill'));
    }

}
