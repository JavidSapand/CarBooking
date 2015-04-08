@extends('layouts.master')
@include('flash-msg.flashmsg')

@section('content')
	{{$book->source}}
@endsection