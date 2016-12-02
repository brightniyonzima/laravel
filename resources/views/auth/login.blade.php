@extends('master')
<!-- @section('sidebar-up') -->
<div class="jumbotron">
    <!-- <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default"> -->
                <div class="panel-heading"><font size="18">Sign In</font></div>
                <div class="panel-body"> 
                    <form class="form-group" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <!-- <label for="email" class="col-md-4 control-label">E-Mail Address</label> -->

                            <div class="form-group">
                                <input id="email" type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <!-- <label for="password" class="col-md-4 control-label">Password</label> -->

                            <div class="form-group">
                                <input id="password" type="password" class="form-control" name="password" placeholder="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div> -->

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" id=login class="btn btn-success">
                                    <i class="fa fa-btn fa-sign-in"></i> Login to Clocking
                                </button>

                                <!-- <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a> -->
                            </div>
                        </div>
                    </form>
                </div>
            <!-- </div>
        </div>
    </div> -->
</div>
<style type="text/css">
    .container {
    width: 40%;
    margin: 50px;
    margin-left: 400px;
    margin-top: 130px;
    padding-right: 0px;
    padding-left: 0px;
    }
    #login{
    background-color: #13722F;
    color: #FFF;
    border: 1px solid #13722F;
    }

</style>
<!-- @endsection -->
