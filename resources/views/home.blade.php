@extends('layouts.app')

@section('main')

<h2>Hey there, {{auth()->user()->name}} <span class="glyphicon glyphicon-thumbs-up"></span></h2>

<div class="row">
    <div class="col-sm-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Bills</h3>
            </div>
            <div class="panel-body">
                <h5>Recently Paid</h5>
                <div class="list-group">
                    @foreach(App\BillPayment::recentForUser(auth()->user())->get() as $payment)
                    <div class="list-group-item">
                        Paid {{$payment->amount_paid}} on 
                        {{$payment->created_at->format('m/d/Y')}}
                    </div>
                    @endforeach
                </div>
                <h4>Due soon</h4>
                <div class="list-group">

                    @foreach(App\Bill::due() as $bill)
                    <div class="list-group-item">
                    <h5>
                        {{$bill->biller->name}}
                        <a href="/bills/{{$bill->id}}/payments/create">Pay bill
                    </a>
                    </h5>
                    <hr />
                    @foreach(App\User::all() as $user)
                        @if($user->paidBill($bill))
                        <span class="glyphicon glyphicon-check text-success"></span> 
                        @else
                        <span class="glyphicon glyphicon-remove text-danger"></span>
                        @endif
                        {{$user->name}} 
                        <br/>
                    @endforeach

                    </div>
                    @endforeach
                </div>
            </div>
            <div class="panel-footer">
            </div>
        </div>
    </div>
</div>

@endsection
