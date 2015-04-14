<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel</title>
	{!! HTML::style('css/css/bootstrap.min.css') !!}
	{!! HTML::style('css/jquery.timepicker.css') !!}
	{!! HTML::style('css/bootstrap-datepicker.css') !!}
	{!! HTML::style('css/table.css') !!}
	{!! HTML::style('js/select2-4.0.0-rc.2/dist/css/select2.min.css') !!}
	<!-- Scripts -->
	{!! HTML::script('js/jquery-1.11.2.min.js')!!}
	{!! HTML::script('js/bootstrap-datepicker.js')!!}	
	{!! HTML::script('js/jquery.timepicker.js')!!}
	{!! HTML::script('js/bootstrapjs/bootstrap.min.js')!!}
	{!! HTML::script('js/select2-4.0.0-rc.2/dist/js/select2.min.js') !!} 
	{!! HTML::script('js/table.js')!!}
	
	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">

		<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>


	<!-- Optional theme -->


</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Laravel</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="{{ url('/') }}">Home</a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="{{ url('/auth/login') }}">Login</a></li>
						<li><a href="{{ url('/auth/register') }}">Register</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->email }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>
	<div class="container">
		@yield('content')
	</div>
	
</body>
</html>
