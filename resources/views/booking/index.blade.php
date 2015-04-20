@extends('app')
@section('content')
<div class="col-lg-12">
	<div class="panel panel-default">
	    <div class="panel-heading">
	        <h4 class="">Available Booking Lists</h4>
	    </div>
	    <!-- /.panel-heading -->
	    <div class="panel-body">
	        <div class="table-responsive table-bordered">
	            <table class="table">
	                <thead >
	                    <tr>
	                    	<th>#</th>
	                        <th>Source</th>
	                        <th>Destination</th>
	                    </tr>
	                </thead>
	                <tbody>
						@foreach($books as $book)
						    <tr>
						    	<td>{{ $book->id }}</td>
								<td>
									<a href="{{ action('BookingController@show',[$book->id]) }}">{{$book->source}} </a>
								</td>
								<td>
									{{ $book->destination}}
								</td>
							</tr>
						@endforeach
					</tbody>
	            </table>
	        </div>
	    </div>
	</div>
</div>
@endsection