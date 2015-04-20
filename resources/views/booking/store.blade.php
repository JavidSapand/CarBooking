@extends('app')
@section('content')
<div class="container-fluid" >
	<div class="row">
	  <div class="col-md-12">
	    @if(Session::has('message'))
	        <div class="alert alert-info">
	          {{Session::get('message')}}
	        </div>
	    @endif
	  </div>
	</div>
</div>

@endsection

