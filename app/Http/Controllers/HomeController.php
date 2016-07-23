<?php

namespace App\Http\Controllers;

use App\Biller;
use App\Http\Requests;
use App\BillObligation;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $billersWithoutBills = Biller::noBillsThisMonth()->get();
        $unpaidObligations = BillObligation::unpaid()->user(auth()->user())->get();

        return view('home', compact('billersWithoutBills', 'unpaidObligations'));
    }
}
