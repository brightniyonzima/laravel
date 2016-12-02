@extends('master')

<!-- @section('header') -->

<div class="header clearfix">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/dashboard') }}">
                    <font color='#EDEFF2'>Clocking</font> <br> <font size="2" color='#EDEFF2'>
                    @if (!Auth::guest())
                    {{ Auth::user()->email }} ({{ Auth::user()->role }})</font>
                    @endif
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <!-- @if (!Auth::guest())
                        <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->email }} ({{ Auth::user()->role }})
                            </a></li>
                    @endif -->
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav nav-pills pull-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li><a href="{{ url('/report') }}">Report</a></li>
                        @if(Auth::user()->role=="admin")
                        <li><a href="{{ url('/users') }}">Users</a></li>
                        @endif
                        <li><a href="{{ url('/logout') }}"><!-- <i class="fa fa-btn fa-sign-out"></i> -->Logout</a></li>

                        <!-- <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->email }} 
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li> -->

                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')
</div>
<style type="text/css">
    .container {
    position: relative;
    height: 40px;
    margin-bottom: 20px;
    border: 1px solid transparent;
    }
</style>



    

