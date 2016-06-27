@extends('layouts.app')

@section('main')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Who are you?</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <p>
                            <select name="user_id" class="form-control input-lg">
                                <option>Pick your name. No cheating.</option>
                                @foreach(App\User::all() as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                        </p>


                        <p><button class="btn btn-primary btn-lg">Log in</button></p>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
