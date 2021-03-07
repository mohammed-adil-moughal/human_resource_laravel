<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript"> var APP_URL = "{{ url('/') }}" ; </script>
    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{asset('/vendor/css/bootstrap/bootstrap.min.css')}}"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <script src="{{URL::asset('vendor/js/jquery/jquery-3.1.0.min.js')}}"></script>
    <script src="https://rawgit.com/RickStrahl/jquery-resizable/master/src/jquery-resizable.js"></script>
    <link rel="stylesheet" href="{{asset('/vendor/css/progress-wizard.min.css')}}">
    <!-- Styles -->
<!--    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}" >
  <link rel="stylesheet" href="{{ URL::asset('css/font_awesome.css') }}">-->

   <link rel="stylesheet" href="{{ URL::asset('vendor/css/event.css') }}">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
<div id="custom-bootstrap-menu" class="navbar navbar-default " role="navigation">
    <div class="container-fluid">
        <div class="navbar-header" style=";background-color:"><a class="navbar-brand " href="{{url('events/admin')}}"><span class="glyphicon glyphicon-calendar" style="margin-left:2px;font-weight: 25px;color:#17a50e "></span>EventBooking</p></a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menubuilder"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse navbar-menubuilder">
            <ul class="nav navbar-nav navbar-left">
               
                <li ><a href="{{url('events/admincategory/seminars')}}">Seminars</a>
                </li>
                <li><a href="{{url('events/admincategory/conferences')}}">Conferences</a>
                </li>
                <li><a href="{{url('events/admincategory/courses')}}">Courses</a>
                </li>
                <li><a href="{{url('events/admincategory/special_events')}}">Special Events</a>
                </li>
            </ul>
        </div>
    </div>
    
</div>

    @section('content') @show
    <!-- JavaScripts -->
<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>-->

<script src="{{URL::asset('vendor/js/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('vendor/js/angularjs/angular.min.js')}}"></script>
    <script src="{{URL::asset('vendor/js/angularjs/event.js')}}"></script>
</body>
</html>
