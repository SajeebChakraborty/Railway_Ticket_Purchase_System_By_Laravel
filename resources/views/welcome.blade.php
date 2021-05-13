
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

					<a class="navbar-brand" href="{{ Url('/') }}">Bangladesh Railway</a>
					</div>
					<ul class="nav navbar-nav">
					<li class="active"><a href="{{ Url('/') }}">Home</a></li>
					<li ><a href="{{ Url('/user/dashboard/'.$user_id) }}">DashBoard</a></li>
					<li class=""><a href="{{ Url('purchase/history/'.$user_id) }}">Purchase History</a></li>
					<li class=""><a href="{{ Url('/verify-ticket') }}">Verify Ticket</a></li>
					<li class=""><a href="{{ Url('/contact-us')}}">Contact us</a></li>
					<li class=""><a href="{{ Url('/user/settings') }}">Settings</a></li>


					</ul>
					<ul class="nav navbar-nav navbar-right">
					<li><a href="{{ Url('/logout') }}"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
					</ul>
				</div>
				</nav>



		@endif
		@if(!$user_login_status)
			
			<nav class="navbar navbar-inverse">
			
			<div class="container-fluid">
			
			<div class="navbar-header">
		
				<a class="navbar-brand" href="{{ Url('/') }}">Bangladesh Railway</a>
			</div>
			<ul class="nav navbar-nav">
				<li class="active"><a href="{{ Url('/') }}">Home</a></li>
				<li class=""><a href="{{ Url('/verify-ticket') }}">Verify Ticket</a></li>
					<li class=""><a href="{{ Url('/contact-us')}}">Contact us</a></li>
		
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="{{ Url('/sign-up') }}"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
				<li><a href="{{ Url('/login') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
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
	$('.datepicker').datepicker({ 

startDate: new Date()

});
</script>
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="booking-form">
						<form method="post" action="{{ Url('train/show') }}">

						@csrf
							
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">FROM</span>
                                        <select name="arrival_station" class="form-control" required>
                                        <option value="select" disabled selected>FROM</option>
                                        <option value="Chittagong">CHITTAGONG</option>
                                        <option value="Dhaka">DHAKA</option>
                                        <option value="Rajshahi">RAJSHAHI</option>
                                        <option value="Sylhet">SYLHET</option>
                                        </select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">TO</span>
                                        <select name="destination_station" class="form-control" required>
                                        <option value="select" disabled selected>TO</option>
                                        <option value="Chittagong">CHITTAGONG</option>
                                        <option value="Dhaka">DHAKA</option>
                                        <option value="Rajshahi">RAJSHAHI</option>
                                        <option value="Sylhet">SYLHET</option>
                                        </select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<span class="form-label">Date</span>
										@php
										date_default_timezone_set("Asia/Dhaka");
        								$date=date("Y-m-d");
										$date=date("Y-m-d");
										$max=date('Y-m-d', strtotime($date. ' + 9 days'));
										@endphp
										<input class="form-control datepicker" type="date" value="{{ $date }}" name="date" min="{{ $date }}" max="{{ $max }}" required>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<span class="form-label">Class</span>
										<select class="form-control" name="class" required>
										<option value="Choose" disabled selected>Choose a class</option>
										<option value="AC_B">AC_B</option>
										<option value="AC_S">AC_S</option>
										<option value="SHOVAN">SHOVAN</option>
                                        <option value="S_CHAIR">S_CHAIR</option>
                                        <option value="SNIGDHA">SNIGDHA</option>
                                      
										</select>
										<span class="select-arrow"></span>
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<span class="form-label">Adults (18+)</span>
										<select class="form-control" name="adult">
											<option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
										</select>
										<span class="select-arrow"></span>
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<span class="form-label">Children (0-17)</span>
										<select class="form-control" name="child">
											<option>0</option>
											<option>1</option>
											<option>2</option>
										</select>
										<span class="select-arrow"></span>
									</div>
								</div>
							</div>
							<div class="row">
								
								<div class="col-md-3">
									<div class="form-btn">
										<button class="submit-btn">Show tickets</button>
									</div>
								</div>
							</div>
						</form>
						<script type="text/javascript">
   
    $('.datepicker').datepicker({ 
        startDate: new Date()
    });
  
</script>
					</div>
				</div>
			</div>
		</div>
	</div>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>