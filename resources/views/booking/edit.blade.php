@extends('app')

@section('content')

@include('errors/errors')

<h1>Add New Booking Here!</h1>

<hr>

{!! Form::model($book,array('method'=>'put','route'=>['booking.update',$book->id],'class'=>'form')) !!}


	<div class="form-group">
		{!! Form::label('user_id','Select Car: ') !!}
		{!! Form::text('user_id',null,['class'=>'form-control']) !!}
	</div>
	
	<div class="form-group">
		{!! Form::label('car_id','Car ID: ') !!}
		{!! Form::text('car_id', null, ['class'=>'form-control','placeholder'=>'1.2.3....']) !!}
	</div>


	<div class="row form-group">
		<div class="col-md-6">
		{!! Form::label('start_time','Start Time: ') !!}
		{!! Form::text('start_time', null, ['class'=>'form-control timepicker']) !!}
	</div>
		<div class="col-md-6">
			{!! Form::label('start_date','Start Date: ') !!}
		{!! Form::text('start_date', null, ['class'=>'form-control datepicker ','data-format'=>'yyyy-dd-mm']) !!}
		</div>
	</div>

	<div class="row form-group">
		<div class="col-md-6">
			{!! Form::label('end_time','End Time: ') !!}
			{!! Form::text('end_time', null, ['class'=>'form-control timepicker']) !!}
		</div>
		<div class="col-md-6">
			{!! Form::label('end_date','End Date: ') !!}
			{!! Form::text('end_date', null, ['class'=>'form-control datepicker','data-format'=>'yyyy-dd-mm']) !!}
		</div>
	</div>

	<div class="form-group">
		{!! Form::label('source','Source: ') !!}
		{!! Form::text('source',null,['class'=>'form-control','placeholder'=>'Source ']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('destination','Destination: ') !!}
		{!! Form::text('destination',null,['class'=>'form-control','placeholder'=>'Destination ']) !!}
	</div>



	<div class="form-group">
		{!! Form::submit('Edit Booking',['class'=>'btn-primary form-control']) !!}
	</div>
	<script type="text/javascript">
		$('.timepicker').timepicker();
	    $('.datepicker').datepicker({
	    	format: 'yyyy-mm-dd'
	    });

	</script>
  
{!! Form::close() !!}

@endsection
