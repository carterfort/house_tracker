@extends('layouts.app')

@section('main')

<h2>Hey there, {{auth()->user()->name}} <span class="glyphicon glyphicon-thumbs-up"></span></h2>

<div class="row">
    <div class="col-sm-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Billers Missing Bills</h3>
            </div>
            <div class="panel-body">
            @if($billersWithoutBills->count())
                <div class="list-group">
                @foreach($billersWithoutBills as $biller)
                    <div class="list-group-item">
                        {{ $biller->name }}
                        <br/>
                        <a href="/billers/{{$biller->id}}/bills/create" class="btn btn-xs btn-success btn-block">Add {{date('F')}} bill</a>
                    </div>
                @endforeach
                </div>
            @else
                <small class="small"> <span class="glyphicon glyphicon-ok-sign text-success"></span> All billers accounted for</small>
            @endif
            </div>
            <div class="panel-footer">
            </div>
        </div>
    </div>

    <div class="col-sm-5">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Unpaid Obligations</h3>
            </div>
            <div class="panel-body">
                <div class="list-group">
                @foreach($unpaidObligations as $obligation)
                    <div class="list-group-item">

                        {{ $obligation->formatted_amount }} for {{$obligation->bill->biller->name}} ({{$obligation->bill->biller->summary}})
                        <br/>
                        <a href="/obligations/{{$obligation->id}}/payments/create">Record payment</a>
                    </div>
                @endforeach
                </div>
            </div>
            <div class="panel-footer">
                Total obligations: {{displayCash($unpaidObligations->sum('amount'))}}
            </div>
        </div>
    </div>

</div>

@endsection
