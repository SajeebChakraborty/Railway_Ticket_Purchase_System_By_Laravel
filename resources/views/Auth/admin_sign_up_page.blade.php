
<!DOCTYPE html>
<html lang="en">

<head>

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>BANGLADESH RAILWAY E-TICKET</title>

	<!-- Google font -->
	<link href="{{ asset('https://fonts.googleapis.com/css?family=PT+Sans:400') }}" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}" />

	<link rel="stylesheet" href="{{ asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css') }}">

<!-- jQuery library -->
<script src="{{ asset('https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js') }}"></script>

<script src="{{ asset('bootstrap.bundle.min.js') }}"></script>


<!-- Latest compiled JavaScript -->
<script src="{{ asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js') }}"></script>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		
 

</head>

<body>

	<div id="booking" class="section">
	@php 

		$user_login_status=Session::get('user_login_status');
		$user_id=Session::get('user_id');
	@endphp
		@if($user_login_status)


				<nav class="navbar navbar-inverse">
	
				<div class="container-fluid">
				
					<div class="navbar-header">

					<a class="navbar-brand" href="{{ Url('/admin/login') }}">Bangladesh Railway</a>
					</div>
				
					<ul class="nav navbar-nav navbar-right">
					<li><a href="{{ Url('/admin/logout') }}"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
					</ul>
				</div>
				</nav>



		@endif
		@if(!$user_login_status)
			
			<nav class="navbar navbar-inverse">
			
			<div class="container-fluid">
			
			<div class="navbar-header">
		
				<a class="navbar-brand" href="{{ Url('/admin/login') }}">Bangladesh Railway</a>
			</div>
	
			<ul class="nav navbar-nav navbar-right">
				<li class="active"><a href="{{ Url('/admin/sign-up') }}"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
				<li><a href="{{ Url('/admin/login') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
			</ul>
			</div>
		</nav>

		@endif
		<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script>
	@if(Session::has('message'))
		var type="{{Session::get('alert-type','info')}}"

		switch(type){
			case 'info':
		         toastr.info("{{ Session::get('message') }}");
		         break;
	        case 'success':
	            toastr.success("{{ Session::get('message') }}");
	            break;
         	case 'warning':
	            toastr.warning("{{ Session::get('message') }}");
	            break;
	        case 'error':
		        toastr.error("{{ Session::get('message') }}");
		        break;
		}
	@endif
	
</script>
		<div class="section-center">
			<div class="container">
				<div class="row">
				<br>
				
					<div class="booking-form">
						<form method="post" action="{{ Url('/admin/sign-up/process') }}">

						@csrf
							
							<div class="row">
								<div class="col-md-5">
									<div class="form-group">
										<span class="form-label">Admin Name</span>
                                       <input type="text" class="form-control" placeholder="Enter Name" name="name" required>
									</div>
								</div>
								<div class="col-md-5">
									<div class="form-group">
                                    <span class="form-label">Email</span>
                                       <input type="email" class="form-control" placeholder="Enter Email" name="email" required>
									</div>
								</div>
                            </div>
                            <div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<span class="form-label">Contact no</span>
                                       <input type="number" class="form-control" placeholder="Enter Contact no" name="contact" required>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
                                    <span class="form-label">NID / Birth Reg </span>
                                       <input type="number" class="form-control" placeholder="Enter NID or Birth Reg" name="nid" required>
									</div>
								</div>
							</div>
                            <div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<span class="form-label">Birth Date</span>
										<input class="form-control" type="date" name="birth_date" required>
									</div>
                                </div>
                                <div class="col-md-3">
									<div class="form-group">
										<span class="form-label">Controller Pin</span>
                                       <input type="password" class="form-control" placeholder="Enter Controller Pin" name="controller_pin" required>
									</div>
								</div>
                                <div class="col-md-3">
									<div class="form-group">
										<span class="form-label">Password</span>
                                       <input type="password" class="form-control" placeholder="Enter Password" name="password" required>
									</div>
								</div>
                            </div>
                           
								
							<div class="row">
								
								<div class="col-md-3">
									<div class="form-btn">
										<button class="submit-btn">Register</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>