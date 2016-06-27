@extends('layouts.app')

@section('main')
<h2>Hey there, {{auth()->user()->name}} <span class="glyphicon glyphicon-thumbs-up"></span></h2>
@endsection
