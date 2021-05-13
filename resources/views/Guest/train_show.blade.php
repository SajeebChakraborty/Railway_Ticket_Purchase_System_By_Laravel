
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
<style>
#not-active {
  pointer-events: none;
  cursor: default;
  text-decoration: none;
  color: black;
}
<a href="l

table {
width: 80%;
}
table, th, td {
border: 1px solid black;
border-collapse: collapse;
}
th, td {
padding: 15px;
text-align: left;
}
#t01 tr:nth-child(even) {
background-color: #D5F5E3;
}
#t01 tr:nth-child(odd) {
background-color: #AEB6BF;
}
.vl {
border-left: 6px solid green;
height: 260px;
}
#t01 th {
background-color: black;
color: white;
}

</style>
@php 

    $form=Session::get('form');
    $to=Session::get('to');
    $class=Session::get('class');
    $date=Session::get('date');



@endphp
<div class="booking-form">

<b><font color="orrange" size="4">FORM &nbsp;&nbsp;: &nbsp;&nbsp;&nbsp; </font>     <font color="white" size="4"><span style="text-transform:uppercase;">{{ $form }} </b></span></font> <br>
<b><font color="orrange" size="4">TO  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  : &nbsp;&nbsp;&nbsp;&nbsp;</font>        <font color="white" size="4"><span style="text-transform:uppercase;">{{ $to }} </b></span></font> <br>
<b><font color="orrange" size="4">CLASS &nbsp;: &nbsp;&nbsp;&nbsp;&nbsp;</font>           <font color="white" size="4">{{ $class }} </b></font> <br>
<b><font color="orrange" size="4">DATE &nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;&nbsp;</font>            <font color="white" size="4">{{ $date }} </b></font>

                </div>
                <br>
                <br>
		<div class="section-center">
        
			<div class="container">
            
				<div class="row">
                
                
<table id="t01" class="" style="width:100%">
        <thead>
            <tr>
            <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <th>&nbsp;&nbsp;SERIAL</th>
                <th>TRAIN NUMBER</th>
                <th>TRAIN NAME</th>
                <th>STARTING TIME</th>
                <th>DESTINATION TIME</th>
				<th> FARE </th>
                <th>SEAT AVAILABLE </th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
        @php
        $count=1;

	

        @endphp
        @foreach($route as $row)
			@php 

			$seat_available=DB::table('tickets_tbl')
			->where('arrival_station',$form)
			->where('destination_station',$to)
			->where('train_number',$row->train_number)
			->where('class',$class)
			->where('date',$date)
			->where('booking_user',null)
			->count();


			$seat_available=DB::table('purchases_tbl')
			->where('form',$form)
			->where('to',$to)
			->where('train_number',$row->train_number)
			->where('class',$class)
			->where('date',$date)
			->where('status','Yes')
			->count();

			$seat_available=50-$seat_available;


			Session::put('$seat_available',$seat_available); 

			$off_day=DB::table('tickets_tbl')
			->where('arrival_station',$form)
			->where('destination_station',$to)
			->where('train_number',$row->train_number)
			->where('class',$class)
			->where('date',$date)
			->count();


			if($off_day !=0)
			{

				$train=DB::table('tickets_tbl')
			->where('arrival_station',$form)
			->where('destination_station',$to)
			->where('train_number',$row->train_number)
			->where('class',$class)
			->where('date',$date)
			->first();



			}
			

		

			if($off_day == 0)
			{

				$seat_available="OFF DAY";



			}

			@endphp
			
            <tr style="">
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $count }} </td>
                <td>{{ $row->train_number }}</td>
                <td>{{ $row->train_name }}</td>
                <td>{{ $row->arrival_time }}</td>
                <td>{{ $row->destination_time }}</td>
			<?php
				if($class=="S_CHAIR")
				{

					$price=360.00;

				}
				else if($class=="SNIGDHA")
				{

					$price=725.00;



				}
				else if($class=="SHOVAN")
				{

					$price=285.00;



				}
				else if($class=="AC_S")
				{

					$price=885.00;



				}
				else if($class=="AC_B")
				{

					$price=1225.00;



				}

				?>
				<td>BDT {{ $price }} </td>
				<td>
				<?php 


				date_default_timezone_set("Asia/Dhaka");
				$current_date=date("Y-m-d");
				$current_time=date("H:i");

				$seat=0;
				$s=0;

				if($seat_available =="OFF DAY")
				{

					echo"<font color=red>$seat_available</font>";
					$seat=1;
					$s=1;


				}
				if($date==$current_date && $s==0)
				{


					if($current_time > $train->arrival_time)
					{
		
						
						echo"<font color=red>Train Already Left</font>";
						$seat_available=0;
						$seat=1;
		
		
					}


				}
				if($seat==0)
				{

					echo"$seat_available";

				}
				

				?>
                </td>
		
                <td>
				
				@if($seat_available =="OFF DAY" || $seat_available==0)
			

					<a href="#" class="btn btn-success"  disabled>Purchase</a> 


				@endif
				@if($seat_available > 0)
				

					<a href="{{ Url('/purchase/'.$row->id) }}" class="btn btn-success"  >Purchase</a> 

				@endif
				
				
				</td>
				
                @php

                    $count++;

                @endphp               

            </tr>
        @endforeach  
    </table>

			</div>
		</div>
	</div>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>