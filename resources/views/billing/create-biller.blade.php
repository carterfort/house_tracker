@extends('layouts.app')

@section('main')

<form method="POST" action="/api/billers">
	{{csrf_field()}}
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Add a new biller</h3>
				</div>
				<div class="panel-body">
					<p>
						<input class="form-control" name="name" placeholder="Name (Duquesne Light, PGH20, etc.)" value="{{old('name')}}">
					</p>
					<p>
						<input type="text" name="summary" class="form-control" placeholder="Description (Electricity, Water, etc.)" value="{{old('summary')}}">
					</p>
					<p>
						<input type="text" name="phone_number" class="form-control" placeholder="(555) 555-5555"  value="{{old('phone_number')}}"/>
					</p>
					<p>
						<input type="text" name="website_url" class="form-control" placeholder="http://www.wherever.com"  value="{{old('website_url')}}"/>
					</p>
				</div>
				<div class="panel-footer text-right">
					<button class="btn btn-success">Create Biller</button>
				</div>
			</div>
		</div>
	</div>
</form>

@stop