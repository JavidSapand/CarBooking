@extends('app')

@section('content')

@include('errors/errors')
	
	<h1>Add New Booking Here!</h1>
	
	<hr>


	{!! Form::open(array('url'=>'booking/store','class'=>'form')) !!}

	 <!-- padding for jsfiddle -->
		
		<div class="form-group">
			{!! Form::label('id','Select Car: ') !!}
			{!! Form::select('id', $car ,null,['class'=>'form-control']) !!} 
		</div>

		
		<div class="row form-group">
	  		<div class="col-md-6">
				{!! Form::label('start_time','Start Time: ') !!}
				{!! Form::text('start_time', '00:00', ['class'=>'form-control timepicker']) !!}
			</div>
	  		<div class="col-md-6">
	  			{!! Form::label('start_date','Start Date: ') !!}
				{!! Form::text('start_date', date('m-d-Y'), ['class'=>'form-control datepicker ','data-format'=>'yyyy-dd-mm']) !!}
	  		</div>
	  		<script type="text/javascript" >
				$('.timepicker').timepicker();
			    $('.datepicker').datepicker();
		    </script>
		</div>

		<div class="row form-group">
			<div class="col-md-6">
				{!! Form::label('end_time','End Time: ') !!}
				{!! Form::text('end_time', '00:00', ['class'=>'form-control timepicker']) !!}
				
			</div>
			<div class="col-md-6">
				{!! Form::label('end_date','End Date: ') !!}
				{!! Form::text('end_date', date('m-d-Y'), ['class'=>'form-control datepicker','data-format'=>'yyyy-dd-mm']) !!}
			</div>

			<script type="text/javascript" >
				$('.timepicker').timepicker();
			    $('.datepicker').datepicker();
		    </script>

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
			{!! Form::submit('Add Booking',['class'=>'btn-success form-control']) !!}
		</div>

	  
	{!! Form::close() !!}





	
@endsection
