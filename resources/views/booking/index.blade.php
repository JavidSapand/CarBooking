@extends('layouts.master')
@section('content')
	<ul>
		@foreach($lists as $list)
		    <article>
				<h2> 
					<a href="{{ action('BookingController@show',[$list->id]) }}">{{$list->source}} </a>
				</h2>
			</article>
			<div class='body'>
				{{ $list->destination }} 
			</div>
		@endforeach
	</ul>
@endsection