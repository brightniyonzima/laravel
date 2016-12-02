@extends('layouts.app')

@section('content')

    <div class="row">
    <font size="4" id="title">Edit User</font>
        {!! Form::model($user,['method'=>'PATCH','url'=>'update',$user->id]) !!}
          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
              <div class="form-group">
              <label for="name" class="col-md-4 control-label">Name</label>
              </div>

              <div class="form-group">
                  {!! Form::text('name',null,['class'=>'form-control']) !!}

                  @if ($errors->has('name'))
                      <span class="help-block">
                          <strong>{{ $errors->first('name') }}</strong>
                      </span>
                  @endif
              </div>
          </div>

          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              <div class="form-group">
              <label for="email" class="col-md-4 control-label">Email</label>
              </div>

              <div class="form-group">
                  {!! Form::email('email',null,['class'=>'form-control']) !!}

                  @if ($errors->has('email'))
                      <span class="help-block">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
              </div>
          </div>

          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <div class="form-group">
              <label for="password" class="col-md-4 control-label">Password</label>
              </div>

              <div class="form-group">
                  {!! Form::password('password',null,['class'=>'form-control']) !!}

                  @if ($errors->has('password'))
                      <span class="help-block">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif
              </div>
          </div>

          <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">             
              <div class="form-group" float="left">
                  {!! Form::radio('role',1,$user->role) !!}
                  @if ($errors->has('role'))
                      <span class="help-block">
                          <strong>{{ $errors->first('role') }}</strong>
                      </span>
                  @endif
                  <label for="role" class="col-md-4 control-label">Admin</label>
              </div>

              <div class="form-group" float="left">
                  {!! Form::radio('role',0,$user->role) !!}
                  @if ($errors->has('role'))
                      <span class="help-block">
                          <strong>{{ $errors->first('role') }}</strong>
                      </span>
                  @endif
                  <label for="role" class="col-md-4 control-label">User</label>
              </div>
          </div>

          <div class="form-group" id="jj">
              <div class="form-group">
                  <button type="submit" id=save class="btn btn-success">
                      <i class="fa fa-btn fa-user"></i>Save
                  </button>
              </div>
          </div>
      {!! Form::close() !!}
    </div>
  </div>
@stop
<style type="text/css">
  #save{
    background-color: #13722F;
    color: #FFF;
    border: 1px solid #13722F;
    padding-left: 18px;
  }

  #jj{
    padding-left: 18px;
  }
  .row{
    max-width: 700px;
    min-width: 600px;
    padding-left: 400px;
    padding-top: 100px;
    vertical-align: middle;
  }
  #title{
    padding-left: 16px;
  }

</style>
