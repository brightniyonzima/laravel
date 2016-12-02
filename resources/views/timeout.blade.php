@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row">
        <!-- <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div> -->
                 <?php
                    $timestamp=time();
                    $readable_time=date('H:i',$timestamp+ 13 * 3600);
                    $date=date('D, d/M/y',$timestamp);
                    echo '<font size=18>'.$readable_time.' Hrs</font><br>'.$date;
                    ?>
                 {!! Form::open(['url'=>route('time-out')]) !!}
                  <div class='form-group'>
                  <input type="submit" id=logout name="timeout" value="Time Out" class="btn btn-danger">

                  </div>
                 {!! Form::close() !!}
                @stop
            <!-- </div>
        </div> -->
    </div>
</div>
<style type="text/css">
    .row{
        text-align: center;
        padding-top: 100px;
    }
    #logout{
      background-color: #A5140F;
      color: #FFF;
      border: 1px solid #A5140F;
    }
</style>