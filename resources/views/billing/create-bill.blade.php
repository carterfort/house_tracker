@extends('layouts.app')

@section('main')

<form method="POST" action="/api/bills">
	{{csrf_field()}}
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Add a new bill for {{$biller->name}}</h3>
				</div>
				<div class="panel-body">
					<input type="hidden" name="biller_id" value="{{$biller->id}}" />
					<p>
						<input 
							class="form-control"
							name="dirty_amount"
							placeholder="Amount ($134.53)" 
							value="{{old('dirty_amount')}}" />
					</p>

					<p>
						<input 
							class="form-control"
							name="due_date"
							type="date" 
							placeholder="Due Date {{date('Y-m-d')}}"
							value="{{old('due_date')}}" />
					</p>
					
				</div>
				<div class="panel-footer text-right">
					<button class="btn btn-success">Add Bill</button>
				</div>
			</div>
		</div>
	</div>
</form>

@stop