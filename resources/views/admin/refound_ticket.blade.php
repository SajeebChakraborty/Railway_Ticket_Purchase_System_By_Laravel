
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>BANGLADESH RAILWAY E-TICKET</title>

	<!-- Google font -->
	<link href="{{ asset('https://fonts.googleapis.com/css?family=PT+Sans:400') }}" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="{{ asset('css/style3.css') }}" />

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
        <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css') }}"></script>

<script src="{{ asset('https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css') }}"></script>
      
      

<!-- Custom stlylesheet -->
<link type="text/css" rel="stylesheet" href="{{ asset('https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css') }}" />
      
      
        <style>


.center {
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 16%;
}


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


body {
  height: 100vh;
  background-color: ;
  
  a:hover {
    text-decoration: none;
  }
}

.profile-pic {
  border-radius: 50%;
  height: 150px;
  width: 150px;
  background-size: cover;
  background-position: center;
  background-blend-mode: multiply;
  color: transparent;
  transition: all .3s ease;

  &:hover {
    background-color: rgba(0,0,0,.5);
    z-index: 10000;
    color: rgba(250,250,250,1);
    transition: all .3s ease;
  }
  
  span {
    display: inline-flex;
    padding: .2em;
  }
}




</style>
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>

</head>

<body>
@php 

$admin_login_status=Session::get('admin_login_status');
$admin_id=Session::get('admin_id');
$admin_status=Session::get('admin_power_status');

@endphp
	<div id="booking" class="section">
	<nav class="navbar navbar-inverse">

  <div class="container-fluid">
  
    <div class="navbar-header">

      <a class="navbar-brand" href="{{ Url('/admin/home') }}">Bangladesh Railway</a>
    </div>


   
    @if($admin_status=="Super Admin")
    <ul class="nav navbar-nav">
    <li><a href="{{ Url('/admin/home') }}">Home</a></li>
      <li class=""><a href="{{ Url('/admin/dashboard/'.$admin_id) }}">DashBoard</a></li>
      <li class=""><a href="{{ Url('admin/train/add') }}">Add Train</a></li>
	  <li class=""><a href="{{ Url('/sell-ticket') }}">Sell Ticket</a></li>
	  <li class="active"><a href="{{ Url('/refound-ticket')}}">Refound Ticket</a></li>
      <li class=""><a href="{{ Url('/admin/list')}}">Admin List</a></li>
    <li class=""><a href="{{ Url('/admin/settings') }}">Settings</a></li>

    @endif
    @if($admin_status=="Station Admin")
    <ul class="nav navbar-nav">
    <li><a href="{{ Url('/admin/home') }}">Home</a></li>
      <li class=""><a href="{{ Url('/admin/dashboard/'.$admin_id) }}">DashBoard</a></li>
	  <li class=""><a href="{{ Url('/sell-ticket') }}">Sell Ticket</a></li>
    <li class=""><a href="{{ Url('/admin/settings') }}">Settings</a></li>

    @endif
    @if($admin_status=="Financial Admin")
    <ul class="nav navbar-nav">
    <li><a href="{{ Url('/admin/home') }}">Home</a></li>
      <li class=""><a href="{{ Url('/admin/dashboard/'.$admin_id) }}">DashBoard</a></li>
	  <li class="active"><a href="{{ Url('/refound-ticket')}}">Refound Ticket</a></li>
    <li class=""><a href="{{ Url('/admin/settings') }}">Settings</a></li>

    @endif
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="{{ Url('/admin/logout') }}"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>
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
<style>
input[type=password], select {
  width: 80%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
.select{

    width: 80%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;

}
input[type=text], select {
  width: 80%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=time], select {
  width: 80%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}


input[type=submit] {
  width: 80%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.frm {
    width: 60%;
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  margin-left : 25%

}

</style>
<body>

<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>&nbsp;&nbsp;Serial</th>
                <th>Bank</th>
                <th>Account Number</th>
                <th>Train Number</th>
                <th>Train Name</th>
                <th>Form</th>
                <th>TO</th>
                <th>Seat Number</th>
                <th>Journey Date & Time</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @php
        $count=1;
        @endphp
        @foreach($data as $row)
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $count }} </td>
                <td>{{ $row->bank }}</td>
                <td>{{ $row->account_no }}</td>
                <td>{{ $row->train_number }}</td>
                <td>{{ $row->train_name }}</td>
                <td>{{ $row->form }}</td>
                <td>{{ $row->to }}</td>
                <td>{{ $row->seat_number }}</td>
                <td>{{ $row->journey_date }}</td>
                <td><a href="{{ Url('/cash-back/'.$row->id) }}" class="btn btn-success">Cash Back</a> </td>

                @php

                    $count++;

                @endphp               

            </tr>
        @endforeach  
    </table>

</body>