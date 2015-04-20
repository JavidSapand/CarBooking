@extends('app')
@section('content')
<div class="col-lg-12">
  <div class="panel panel-default">
    <div class="panel-heading">
        <h4> List details</h4>
    </div>
    <div class="panel-body">
      <div class="table-responsive table-bordered">
        <table class="table">
          <thead style="">
              <tr>
                <th>#</th>
                <th>Source</th>
                <th>Destination</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Actions</th>
              </tr>
          </thead>
          <tbody>
            <tr> 
              <td>{{ $book->id }}</td>   
             	<td>{{ $book->source }}</td>
             	<td>{{ $book->destination }} </td>
             	<td>{{ $book->start_time }}</td>
             	<td>{{ $book->end_time }} </td>
              <td>{{ $book->start_date }}</td>
              <td>{{ $book->end_date }}</td>
              <td>
              <span style="float:left;">
                {!! Form::open(array('route' => array('booking.edit', $book->id), 'method' => 'get')) !!}
                  <button type="submit" href="{{ URL::route('booking.edit', [$book->id]) }}" class="glyphicon glyphicon-pencil" title="Edit book"></button>
                {!! Form::close() !!}
              </span>
              <span style="float:left;">
                {!! Form::open(array('route' => array('booking.destroy', $book->id), 'method' => 'delete')) !!}
                  <button type="submit" href="{{ URL::route('booking.destroy', [$book->id]) }}" class="glyphicon glyphicon-remove" title="Delete book"></button>
                {!! Form::close() !!}
              </span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div> 
@endsection

