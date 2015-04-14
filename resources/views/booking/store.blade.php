@extends('app')
@include('flash-msg.flashmsg')

@section('content')
	{{$book->source}}
@endsection