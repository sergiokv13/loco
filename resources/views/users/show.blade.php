@extends('app')


@section('content')
<h1>{{$user->username}}</h1>

@if(Auth::user()->username == $user->username)
	<form class="form-horizontal" role="form" method="POST" action="{{ url('/tweet/store') }}">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="input" name="tweet">
		<input type="submit" value="post" name="post">
	</form>

@endif

@foreach ($user->tweets as $tweet)
	<p>{{$tweet->tweet}}</p>
@endforeach

@stop