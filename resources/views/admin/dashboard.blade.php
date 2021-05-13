
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
@mixin object-center {
  display: flex;
  justify-content: center;
  align-items: center;

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
.ul2 {
  list-style-type: none;
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: #f1f1f1;
  border: 1px solid #555;
 
  height: 500px;
}

.li2 a {
  display: block;
  color: #000;
  padding: 8px 16px;
  text-decoration: none;
}

.li2 {
  text-align: center;
  border-bottom: 1px solid #555;
}

.li2:last-child {
  border-bottom: none;
}

.li2 a.active {
  background-color: #4CAF50;
  color: white;
}

.li2 a:hover:not(.active) {
  background-color: #555;
  color: white;
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

	<div id="booking" class="section">
	<nav class="navbar navbar-inverse">

  <div class="container-fluid">
  
    <div class="navbar-header">

      <a class="navbar-brand" href="{{ Url('/admin/home') }}">Bangladesh Railway</a>
    </div>
    @foreach($data as $row)
    @if($row->admin_status=="Super Admin")
    <ul class="nav navbar-nav">
    <li><a href="{{ Url('/admin/home') }}">Home</a></li>
      <li class="active"><a href="{{ Url('/admin/dashboard/'.$row->id) }}">DashBoard</a></li>
      <li class=""><a href="{{ Url('admin/train/add') }}">Add Train</a></li>
	  <li class=""><a href="{{ Url('/sell-ticket') }}">Sell Ticket</a></li>
	  <li class=""><a href="{{ Url('/refound-ticket')}}">Refound Ticket</a></li>
      <li class=""><a href="{{ Url('/admin/list')}}">Admin List</a></li>
    <li class=""><a href="{{ Url('/admin/settings') }}">Settings</a></li>

    @endif
    @if($row->admin_status=="Station Admin")
    <ul class="nav navbar-nav">
    <li><a href="{{ Url('/admin/home') }}">Home</a></li>
      <li class="active"><a href="{{ Url('/admin/dashboard/'.$row->id) }}">DashBoard</a></li>
	  <li class=""><a href="{{ Url('/sell-ticket') }}">Sell Ticket</a></li>
    <li class=""><a href="{{ Url('/admin/settings') }}">Settings</a></li>

    @endif
    @if($row->admin_status=="Financial Admin")
    <ul class="nav navbar-nav">
    <li><a href="{{ Url('/admin/home') }}">Home</a></li>
      <li class="active"><a href="{{ Url('/admin/dashboard/'.$row->id) }}">DashBoard</a></li>
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
<div class="btn pull-right">
<a href="{{ Url('/admin/dashboard/edit/'.$row->id) }}" class="btn btn-danger">Edit Info</a>
</div>
@if($row->photo)
<center><img src="{{asset($row->photo)}}" height="235" width="235" style="border-radius: 50%;" class="">
@endif

@if(! $row->photo)

<center><img src="{{asset('img/user_logo.png')}}" height="235" width="235" style="border-radius: 50%;" class="">


@endif
<a href="{{ Url('/admin/change/profile-picture/'.$row->id) }}" aria-label="Change Profile Picture">


      <span class="glyphicon glyphicon-camera"></span>
      
      <span>Change Image</span>

    </center>
  </div>
</a>
<font color="red"><h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $row->name }} ( {{$row->admin_status}} )</h1></font>



  
<br>

  <div class="">
    
    <center>
    
    <table id="t01" class="">
    
    <tr>
    <td> Contact :</td>
    <td> {{ $row->contact  }} </td>
    </tr>

    <tr>
    <td> Email Address :</td>
    <td> {{ $row->email }} </td>
    </tr>

    
    <tr>
    <td> NID/Birth Reg :</td>
    <td>  {{ $row->nid }} </td>
    </tr>

    <tr>
    <td> Date of Birth :</td>
    <td> {{ $row->birth_date }} </td>
    </tr>

   </table>
    </center>
  </div>

    @endforeach
</body>