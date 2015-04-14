@extends('app')
@section('content')
	<!-- h2 class="alert alert-success">Source: {{ $book->source }}</h2>
	<hr>
	<div class="alert alert-danger">
		<h3>Destination: {{ $book->destination }}</h3>
		<h3> Start Time: {{ $book->start_time }}</h3>
		<h3>   End Time: {{ $book->end_time }}</h3>
	</div> -->
	<div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>List details</h4>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive table-bordered">
                    <table class="table">
                        <thead style="background-color:dark-blue;">
                            <tr>
                                <th>Source</th>
                                <th>Destination</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                               <tr>
                               	<td>{{ $book->source }}</td>
                               	<td>{{ $book->destination }} </td>
                               	<td>{{ $book->start_time }}</td>
                               	<td>{{ $book->end_time }} </td>
                               	<td><span class="glyphicon glyphicon-ok-circle"></span>&nbsp&nbsp&nbsp&nbsp
                               			<span class="glyphicon glyphicon-trash"></span>
                               	</td>
                               </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> 
	
@endsection

