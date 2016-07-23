@extends('layouts.app')

@section('main')

<form method="POST" action="/api/obligations/{{$obligation->id}}/add-payment">
	{{csrf_field()}}
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Add a payment for {{$obligation->bill->biller->name}} due on {{$obligation->bill->due_date->format('m/d/Y')}}</h3>
				</div>
				<div class="panel-body">

					<p>
						<input 
							class="form-control"
							name="dirty_amount"
							placeholder="Amount ($134.53)"
							value="{{old('dirty_amount', $obligation->formatted_amount)}}" />
					</p>

					<p>
						<input 
							class="form-control"
							name="payment_made_on"
							type="date" 
							placeholder="Payment made on {{date('Y-m-d')}}"
							value="{{old('payment_made_on', date('Y-m-d'))}}" />
					</p>
				</div>
				<div class="panel-footer text-right">
					<button class="btn btn-success">Record Payment</button>
				</div>
			</div>
		</div>
	</div>
</form>


@stop