
<!DOCTYPE html>
<html lang="en">

<head>
    						
<style>
.grid-container {
  display: grid;
  grid-row-gap: 10px;
  grid-template-columns: auto auto auto;
  background-color: #2196F3;
  padding: 10px;
}

.grid-item {
  background-color: rgba(255, 255, 255, 0.8);
  border: 1px solid rgba(0, 0, 0, 0.8);
  padding: 20px;
  font-size: 30px;
  text-align: center;
}
</style>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>BANGLADESH RAILWAY E-TICKET</title>

	<!-- Google font -->
	<link href="{{ asset('https://fonts.googleapis.com/css?family=PT+Sans:400') }}" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="{{ asset('css/style4.css') }}" />

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



		<div class="">
			<div class="container">
				<div class="row">
					<div class="booking-form">
					<div class="btn pull-right">
					<form method="post" action="{{ Url('confirm-booking') }}">
					@csrf
				<input type="submit" class="btn btn-danger btn-lg" value="Confirm Booking">
			</div>
	<font color="red"><h1><center>&nbsp;&nbsp;&nbsp;&nbsp; Seat Selection</center> </h1></font>
	

					<div class="container">
					
    <div class="row">
	
        <div class="form-group">
		
            <div class="items-collection">
			
			@php

				$i=1;

				$form=Session::get('form');
				$to=Session::get('to');
				$class=Session::get('class');
				$date=Session::get('date');
				$tran_no=Session::get('train_number');
				$date=Session::get('date');


				

			@endphp
				@while($i<=50)


				@php

				$available=DB::table('tickets_tbl')
				->where('arrival_station',$form)
				->where('destination_station',$to)
				->where('class',$class)
				->where('date',$date)
				->where('seat_no',$i)
				->where('train_number',$tran_no)
				->where('booking_user',null)
				->count();

				$available=DB::table('purchases_tbl')
				->where('form',$form)
				->where('to',$to)
				->where('class',$class)
				->where('date',$date)
				->where('train_number',$tran_no)
				->where('seat_number',$i)
				->where('status','Yes')
				->count();

				@endphp


				@if($available == 1)
                <div class="items col-xs-6 col-sm-3 col-md-3 col-lg-3" >
                    <div class="info-block block-info clearfix" >
                        <div data-toggle="buttons" class="btn-group bizmoduleselect" >
                            <label class="btn btn-default" style="background-color:red;  color:white;">
                                <div class="itemcontent" >
                                    <input type="checkbox" name="seat[{{ $i }}]" autocomplete="off" value="{{$i}}"  >
                                    <span class="fa fa-car fa-2x"></span>
                                    <h5>{{ $i }}</h5>
                                </div>
                            </label>
							
                        </div>
						
                    </div>
                </div>
				@endif

				@if($available == 0)
                <div class="items col-xs-6 col-sm-3 col-md-3 col-lg-3" >
                    <div class="info-block block-info clearfix" >
                        <div data-toggle="buttons" class="btn-group bizmoduleselect" >
                            <label class="btn btn-default">
                                <div class="itemcontent" >
                                    <input type="checkbox" name="seat[{{$i}}]" autocomplete="off" value="{{$i}}">
                                    <span class="fa fa-car fa-2x"></span>
                                    <h5>{{ $i }}</h5>
                                </div>
                            </label>
							
                        </div>
						
                    </div>
                </div>
				@endif
				
				
				@php 

					$i++;

				@endphp    
				
                @endwhile   
				

				             

            </div>
			</form>
        </div>
    </div>
     
</div>

<style>
#search {
	width:90%;
	
}

.searchicon {
    color:#5CB85C;
}

.items-collection{
    margin:20px 0 0 0;
}
.items-collection label.btn-default.active{
    background-color:green;
    color:#FFF;
}
.items-collection label.btn-default{
    width:90%;
    border:1px solid #305891;
    margin:5px; 
    border-radius: 17px;
	color: #305891;
	
}
.items-collection label .itemcontent{
    width:100%;
}
.items-collection .btn-group{
	width:90%
	
}
</style>

<script>
$(function () {
    $('#search').on('keyup', function () {
        var pattern = $(this).val();
        $('.items-collection .items').hide();
        $('.items-collection .items').filter(function () {
            return $(this).text().match(new RegExp(pattern, 'i'));
        }).show();
    });
});
</script>
					

					</div>
				</div>
			</div>
		</div>
	</div>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>