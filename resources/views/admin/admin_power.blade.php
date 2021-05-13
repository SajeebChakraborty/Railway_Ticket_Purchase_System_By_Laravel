
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
	  <li class=""><a href="{{ Url('/refound-ticket')}}">Refound Ticket</a></li>
      <li class="active"><a href="{{ Url('/admin/list')}}">Admin List</a></li>
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
	  <li class=""><a href="{{ Url('/refound-ticket')}}">Refound Ticket</a></li>
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

input[type=date], select {
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
<br>
<center>

<h3><font color="red"><b>Change Admin Power</b></font></h3>
</center>
<br>
<div class="frm">
    @foreach($admin as $row)
  <form action="{{ Url('/admin-power/change/confirm/'.$row->id) }}" method="post">
    @csrf
    
    <label for="lname">Name</label>
    <br>
    <input type="text" id="lname" name="train_number" placeholder="Enter Train Number.." value ="{{ $row->name }}" readonly required>
    <br>
    <label for="lname">Email</label>
    <br>
    <input type="text" id="lname" name="arrival_time" placeholder="Enter Train Name.." value="{{ $row->email }}" readonly required>

    <br>

  
    <select name="admin_status" class="">
                    
                                        <option value="Super Admin"
                                        
                                        @if($row->admin_status=="Super Admin")
                                        

                                                selected

                                            
                                        @endif
                                        


                                            


                                        
                                        
                                        
                                        >Super Admin</option>
                                        <option value="Station Admin"
                                        
                                        @if($row->admin_status=="Station Admin")
                                        

                                        selected

                                    
                                         @endif
                                        
                                        
                                        >Station Admin</option>
                                        <option value="Financial Admin"
                                        
                                        @if($row->admin_status=="Financial Admin")
                                        

                                        selected

                                    
                                         @endif
                                        
                                        
                                        >Financial Admin</option>
                                       
     </select>

    <input type="submit" value="Submit">
    @endforeach
  </form>
</div>

</body>