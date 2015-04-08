@extends('layouts.master')

@section('content')
	<h2> {{ $book->source }}</h2>
	<hr>
	<h3> {{ $book->destination }}</h3>
@endsection

