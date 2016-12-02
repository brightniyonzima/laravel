@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <!-- <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                     You are logged in
                </div> -->

                <?php
                    $dateTimeZoneTaipei = new DateTimeZone("Africa/Nairobi");
                    $timestamp=time();
                    $readable_time=date('H:i',$timestamp+ 3 * 3600);
                    $date=date('D, d/M/y',$timestamp);
                    echo '<font size=18>'.$readable_time.' Hrs</font><br>'.$date;
                ?>

                 {!! Form::open(['url'=>route('time-post')]) !!}
                  <div class='form-group'>
                  <input type="submit" id="timeIn" value="TimeIn" class="btn btn-success" >
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
    #timeIn{
        background-color: #13722F;
        color: #FFF;
        border: 1px solid #13722F;
    }
</style>

<script type="text/javascript">
    function clockingin() {
        document.getElementById("timeIn").style.color = "red";
        document.getElementById("timeIn").value = "TimeOut";
    }
    function clockingout() {
        document.getElementById("timeOut").style.color = "red";
        document.getElementById("timeOut").value = "TimeIn";
    }
</script>
