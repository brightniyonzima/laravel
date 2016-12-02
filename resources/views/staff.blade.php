@extends('layouts.app') 

@section('content')

<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.css">  
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.js"></script>
<script type="text/javascript">
$(document).ready( function () {
    $('#users').DataTable();
} );

function deleting(){
	var del=confirm("Are you sure you want to delete this user?");
	if(!del){
		location.href='users';
	}
}

function check_empty() {
	if (document.getElementById('name').value == "" || document.getElementById('email').value == "" || document.getElementById('password').value == "") {
	   alert("Please fill in all the Fields !");
	} 
	else {
		document.getElementById('form').submit();
		alert("Form Submitted Successfully...");
		}
}

//Function To Display Popup
function div_show() {
    document.getElementById('abc').style.display = "block";
}

//Function to Hide Popup
function div_hide(){
	document.getElementById('abc').style.display = "none";
}
</script>

<style type="text/css">
    .table-responsive {
    	margin-left: 40px;
    	margin-right: 40px;
    }
    th {
    	color: #fff;
    	background-color: #0066CC;
    }
	td a{
		color: #009966;
	}
	#del{
		background-color: #A5140F;
	    color: #FFF;
	    border: 1px solid #A5140F;
	}
	#popup{
		background-color: #006633;
	    color: #FFF;
	    border: 1px solid #006633;
	}
	
</style>

<div class="container">
    <div class="row">
        <div id="users">
			<div class="table-responsive">
			    <div id="usercaption" float=left>
			    	<font size="10">Users</font>
			    </div>
				<div class="form-group" align="right">
				    <form action="#">
					
					  <input type="submit" id="popup" value="+Add User" class="btn btn-success" onclick="div_show()">
					{!! Form::close() !!}
				</div>
					<table class="table table-bordered table-striped table-hover">
			            <thead>
			                <tr>
			                    <th>#</th>
			                    <th>Name</th>
			                    <th>Email</th>
			                    <th>Role</th>
			                    <th>Created at</th>
			                    <th>Action</th>
			                </tr>
			            </thead>
			            <tbody>
			            @foreach ($all_staff as $staff_detail)
			                <tr>
			                    <td>{{ $staff_detail['id'] }} </td>
			                	<td><a href="userdetails?id={{$staff_detail['id']}}"> {{ $staff_detail['name'] }} </a></td>
			                	<td>{{ $staff_detail['email'] }} </td>
			                	<td>{{ $staff_detail['role'] }} </td> 
			                	<td>{{ $staff_detail['created_at'] }} </td>
			                	<td><a id="del" class="btn btn-lg btn-danger" onClick="return confirm('Delete User?')" href="deleteuser?id={{$staff_detail['id']}}">delete</a></td>
			                </tr>
			            @endforeach
			            </tbody>    
			        </table>
			</div>
		</div>	
    </div>
</div>

<div id="abc">
<!-- Popup Div Starts Here -->
<div id="popupContact">
<!-- Registration Form -->
<form action="createuser" id="form" method="post" name="form" class="form-horizontal">
{{ csrf_field() }}

<img id="close" src="images\close.png" onclick ="div_hide()">
<h2>Add User</h2>
<hr>
<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label for="name" class="col-md-4 control-label">Name</label>

    <div class="form-group">
        <input id="name" type="text" placeholder="Fullname" class="form-control" name="name" value="{{ old('name') }}">

        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <label for="email" class="col-md-4 control-label">Email</label>

    <div class="form-group">
        <input id="email" placeholder="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
    <label for="password" class="col-md-4 control-label">Password</label>

    <div class="form-group">
        <input id="password" placeholder="Password" type="password" class="form-control" name="password">

        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group">
<input type="radio" name="role" value="admin">Admin
<input type="radio" name="role" value="user">User
</div>
<input type="submit" id="submit" name="submit" value="+Add User" onclick="check_empty()">
<input type="submit" id="submit-close" name="submit-close" value="close" class="btn btn-default" onclick ="div_hide()">
</form>
</div>
<!-- Popup Div Ends Here -->
</div>

<style type="text/css">
    .row{
        text-align: center;
        padding-top: 100px;
    }
    @import "http://fonts.googleapis.com/css?family=Raleway";
	/*----------------------------------------------
	CSS settings for HTML div Exact Center
	------------------------------------------------*/
	#abc {
	width:100%;
	height:100%;
	opacity:.95;
	top:0;
	left:0;
	display:none;
	position:fixed;
	background-color:#313131;
	overflow:auto
	}
	img#close {
	position:absolute;
	right:-14px;
	top:-14px;
	cursor:pointer
	}
	div#popupContact {
	position:absolute;
	left:50%;
	top:17%;
	margin-left:-202px;
	font-family:'Raleway',sans-serif
	}
	#form {
	max-width:300px;
	min-width:450px;
	padding:10px 50px;
	border:2px solid gray;
	border-radius:10px;
	font-family:raleway;
	background-color:#fff
	}
	p {
	margin-top:30px
	}
	h2 {
	background-color:#FEFFED;
	padding:20px 35px;
	margin:-10px -50px;
	text-align:center;
	border-radius:10px 10px 0 0
	}
	hr {
	margin:10px -50px;
	border:0;
	border-top:1px solid #ccc
	}
	input[type=text] {
	padding:10px;
	margin-top:30px;
	border:1px solid #ccc;
	font-size:16px;
	font-family:raleway
	}
	#name {
	background-image:url(../images/name.jpg);
	background-repeat:no-repeat;
	background-position:5px 7px
	}
	#email {
	background-image:url(../images/email.png);
	background-repeat:no-repeat;
	background-position:5px 7px
	}
	textarea {
	background-image:url(../images/msg.png);
	background-repeat:no-repeat;
	background-position:5px 7px;
	width:82%;
	height:95px;
	padding:10px;
	resize:none;
	margin-top:30px;
	border:1px solid #ccc;
	padding-left:40px;
	font-size:16px;
	font-family:raleway;
	margin-bottom:30px
	}
	#submit {
	text-decoration:none;
	width:40%;
	text-align:center;
	display:block;
	background-color: #13722F;
    color: #FFF;
    border: 1px solid #13722F;
	padding:10px 0;
	font-size:20px;
	cursor:pointer;
	border-radius:5px
	}
	#submit-close {
	text-decoration:none;
	width:40%;
	text-align:center;
	display:block;
	background-color: #6E6767;
    color: #FFF;
    border: 1px solid #6E6767;;
	padding:10px 0;
	font-size:20px;
	cursor:pointer;
	border-radius:5px
	}
	span {
	color:red;
	font-weight:700
	}
	button {
	width:10%;
	height:45px;
	border-radius:3px;
	background-color:#cd853f;
	color:#fff;
	font-family:'Raleway',sans-serif;
	font-size:18px;
	cursor:pointer
	}
</style>
@stop

