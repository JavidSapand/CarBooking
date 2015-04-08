@extends('app')

@section('content')

@include('errors/errors')

	<h1>Add New Booking Here!</h1>

	<hr>

	{!! Form::open(array('url'=>'booking/store','class'=>'form')) !!}

		<div class="form-group">
			<!-- {!! Form::label('car_id','Car ID: ') !!}
			{!! Form::text('car_id', null, ['class'=>'form-control','placeholder'=>'1.2.3....']) !!} -->
			{!! Form::label('user_id','Select Car: ') !!}
			{!! Form::text('user_id',null,['class'=>'form-control']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('car_id','Car ID: ') !!}
			{!! Form::text('car_id', null, ['class'=>'form-control','placeholder'=>'1.2.3....']) !!}
			<!-- {!! Form::label('car_id','Select Car: ') !!}
			{!! Form::select('car_id', ['car_0'=>'Corolla','car_1'=>'Toyota'],null,['class'=>'form-control']) !!} -->
		</div>

		<div class="form-group">
			{!! Form::label('start_time','Start Time: ') !!}
			{!! Form::input('date','start_time', date('Y-m-d'), ['class'=>'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('end_time','End Time: ') !!}
			{!! Form::input('date','end_time', date('Y-m-d'), ['class'=>'form-control']) !!}
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
