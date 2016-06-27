<?php

namespace App\Http\Controllers\Api;

use App\Bill;
use App\Biller;
use App\BillPayment;
use App\Http\Requests;
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
    	return redirect("/bills/{$bill->id}/payments/create");
    }

    public function storePayment(Request $request, Bill $bill)
    {
    	$this->validate($request, [
    		'dirty_amount' => 'required',
    	]);

    	$payment = new BillPayment($request->all());
    	$payment->user_id = auth()->user()->id;

    	$bill->makePayment($payment);

    	return home();
    }
}
