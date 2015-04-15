@extends('app')

@section('content')

	<div class="container">
		<nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle navbar-toggle-sidebar collapsed">
			MENU
			</button>
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">
				Administrator
			</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">      
			<form class="navbar-form navbar-left" method="GET" role="search">
				<div class="form-group">
					<input type="text" name="q" class="form-control" placeholder="Search">
				</div>
				<button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
			</form>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="http://www.pingpong-labs.com" target="_blank">Visit Site</a></li>
				<li class="dropdown ">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
						Account
						<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li class="dropdown-header">SETTINGS</li>
							<li class=""><a href="#">Other Link</a></li>
							<li class=""><a href="#">Other Link</a></li>
							<li class=""><a href="#">Other Link</a></li>
							<li class="divider"></li>
							<li><a href="#">Logout</a></li>
						</ul>
					</li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>  	
	<div class="container-fluid main-container">
  		<div class="col-md-2 sidebar">
  			<div class="row">
	<!-- uncomment code for absolute positioning tweek see top comment in css -->
	<div class="absolute-wrapper"> </div>
	<!-- Menu -->
	<div class="side-menu">
		<nav class="navbar navbar-default" role="navigation">
			<!-- Main Menu -->
			<div class="side-menu-container">
				<ul class="nav navbar-nav">
					<li class="active"><a href="#"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
					<li><a href="#"><span class="glyphicon glyphicon-plane"></span> Active Link</a></li>
					<li><a href="#"><span class="glyphicon glyphicon-cloud"></span> Link</a></li>

					<!-- Dropdown-->
					<li class="panel panel-default" id="dropdown">
						<a data-toggle="collapse" href="#dropdown-lvl1">
							<span class="glyphicon glyphicon-user"></span> Sub Level <span class="caret"></span>
						</a>

						<!-- Dropdown level 1 -->
						<div id="dropdown-lvl1" class="panel-collapse collapse">
							<div class="panel-body">
								<ul class="nav navbar-nav">
									<li><a href="#">Link</a></li>
									<li><a href="#">Link</a></li>
									<li><a href="#">Link</a></li>

									<!-- Dropdown level 2 -->
									<li class="panel panel-default" id="dropdown">
										<a data-toggle="collapse" href="#dropdown-lvl2">
											<span class="glyphicon glyphicon-off"></span> Sub Level <span class="caret"></span>
										</a>
										<div id="dropdown-lvl2" class="panel-collapse collapse">
											<div class="panel-body">
												<ul class="nav navbar-nav">
													<li><a href="#">Link</a></li>
													<li><a href="#">Link</a></li>
													<li><a href="#">Link</a></li>
												</ul>
											</div>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</li>

					<li><a href="#"><span class="glyphicon glyphicon-signal"></span> Link</a></li>

				</ul>
			</div><!-- /.navbar-collapse -->
		</nav>

	</div>
</div>  		
</div>
  		
  			 <!-- /.col-lg-6 -->
                <div class="col-lg-9">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Users are waiting for confirmation</h4>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
							<div class="alert alert-success" style="display:none">
							</div>
                            <div class="table-responsive table-bordered">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Email</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php $count = 0; ?>
                                       @foreach($users as $user)
                                       		<?php $count++; ?>
	                                       <tr id="{{$user->id}}">
	                                       	<td>{{ $count }}</td>
	                                       	<td id = "user_id" style="display:none">{{ $user->id }}</td>
	                                       	<td>{{ $user->email }} </td>
	                                       	<td>
	                                       		<a href="javascript:void(0)" onclick="confirmUser({{$user->id}})">
	                                       		<i class="glyphicon glyphicon-ok-circle" title="confirm user"></i></a>
	                                       		&nbsp&nbsp&nbsp&nbsp
	                                       		<a href="javascript:void(0)" onclick="removeUser({{$user->id}})">
	                                       		<i class="glyphicon glyphicon-trash" title="remove user"></i></a>

	                                       	</td>
	                                       </tr>
	                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
            
  		</div>
  		<footer class="pull-left footer">
  			<p class="col-md-12">
  				<hr class="divider">
  				Copyright &COPY; 2015 <a href="http://www.pingpong-labs.com">Gravitano</a>
  			</p>
  		</footer>
  	</div>
    </div>
    <script type="text/javascript">
    	function confirmUser(id){
    		var user_id = id;
    		
    		$.ajax({
            data:  user_id,
            url:   "ajax/edit/"+user_id+"",
            type:  "get",
            success:  function (data) {
                $('#'+user_id).fadeOut(1000);
                $('.alert').css('display', 'block');
                $('.alert').html(data);
                $('.alert').fadeOut(2000);
            }
        });	
    	}

    	function removeUser(id){
    		var user_id = id;
    		
    		$.ajax({
            data:  user_id,
            url:   "ajax/remove/"+user_id+"",
            type:  "get",
            success:  function (data) {
                $('#'+user_id).fadeOut(1000);
                $('.alert').css('display', 'block');
                $('.alert').html(data);
                $('.alert').fadeOut(2000);
            }
        });	
    	}
    </script>
@endsection