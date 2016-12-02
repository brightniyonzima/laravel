@extends('layouts.app')

@section('content')

<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.css">  
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.js"></script>

<?php
  $id = Auth::user()->id;
  $logs_for_logged_in_user = App\Users::findOrfail($id)->userlogs();
  //dd($logs_for_logged_in_user->get()->toArray());
?>
	<div id="users">
		<div class="table-responsive" id="users-table">
			<table class="table table-bordered">
			<caption>Users</caption>
	            <thead>
	            </thead>
	            <tbody>
	            @foreach ($staff as $staff_detail)
	                <tr>
	                	<td><a href=""> {{ $staff_detail['name'] }}<br>{{ $staff_detail['email'] }} </a></td> 
	                </tr>
	            @endforeach
	            </tbody>    
	        </table>
		</div>
	</div>

	<div id="logs"> <!-- use data table -->
		<div>
			<table class="table table-bordered table-striped table-hover">
			<caption>Logs for <?php $date = date('M,Y',time()); echo $date?></caption>
	            <thead>
	                <tr></tr>
	                <tr>
	                    <th>Date</th>
	                    <th>Time In</th>
	                    <th>Time Out</th>
	                </tr>
	            </thead>
	            <tbody>
	            @foreach ($logs as $userlog)
	                <tr>
	                	<td>{{ $userlog['logdate'] }}</td>
	                	<td>{{ $userlog['timeIn'] }}</td>
	                	<td>{{ $userlog['timeOut'] }}</td> 
	                </tr>
	            @endforeach
	            </tbody>    
	        </table>
		</div>
	</div>
@stop
<style type="text/css">
	#users{
		float: left;
		width: 500px;
	}
	#logs{
		float: left;
		width: 900px;
		margin-left: 15px;
	}
	#users-table{
		margin-left: 12px;
		float: left;
		max-width: 500px;
		min-width: 400px;
	}
	#logs{
		max-width: 700px;
		min-width: 500px;
		float: left;
	}
	#users tr a{
		color: grey;
	}
	#users tr:hover{
		color: #fff;
    	background-color: #0066CC;
	}
	#users tr a:hover{
		color: #fff;
	}
</style>
