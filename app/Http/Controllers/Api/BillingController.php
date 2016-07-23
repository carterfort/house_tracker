<?php

namespace App\Http\Controllers\Api;

use App\Bill;
use App\Biller;
use App\BillPayment;
use App\Http\Requests;
use App\BillObligation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BillingController extends Controller
{
    public function storeBiller(Request $request)
    {
    	$this->validate($request, [
    		'name' => 'required'
    	]);

    	$biller = Biller::create($request->all());
    	return redirect("/billers/{$biller->id}/bills/create");
    }

    public function storeBill(Request $request)
    {
    	$this->validate($request, [
    		'biller_id' => 'required|integer',
    		'dirty_amount' => 'required',
    		'due_date' => 'required|date'
    	]);
    	
    	$bill = Bill::create($request->all());
    	return redirect("/");
    }

    public function storePayment(Request $request, BillObligation $obligation)
    {
    	$this->validate($request, [
    		'dirty_amount' => 'required',
    	]);

    	$payment = new BillPayment([
            'dirty_amount' => $request->dirty_amount,
            'payment_made_on' => $request->payment_made_on
        ]);
    	$payment->user_id = auth()->user()->id;

    	$obligation->makePayment($payment);

    	return home();
    }
}
