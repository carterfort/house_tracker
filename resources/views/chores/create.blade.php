@extends('layouts.app')

@section('main')

<form method="POST" action="/api/chores">

	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Add a new chore</h3>
				</div>
				<div class="panel-body">

					<p>
						<input class="form-control" name="name" placeholder="Chore name (Take out the trash, water the plants, etc.)" value="{{old('name')}}" />
					</p>

					<p>
						<textarea class="form-control" name="summary" placeholder="What does this chore entail?">{{old('summary')}}</textarea>
					</p>

					<hr />

					<p>
						<input 
							class="form-control"
							name="best_time_to_do"
							placeholder="When is the best time to do this chore?"
							value="{{old('best_time_to_do')}}"
							/>
					</p>
					<p>
						<input 
							class="form-control"
							name="repeats_every"
							placeholder="How often does this need to be repeated?"
							value="{{old('repeats_every')}}"
							/>
					</p>
					
				</div>
				<div class="panel-footer text-right">
					<button class="btn btn-success">Create Chore</button>
				</div>
			</div>
		</div>
	</div>

</form>

@stop